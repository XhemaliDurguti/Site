<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Middleware\Admin;
use App\Http\Requests\AdminRoleUserStoreRequest;
use App\Http\Requests\AdminRoleUserUpdateRequest;
use App\Mail\RoleUserCreateMail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $admins = Admin::all();
        return view('admin.role-users.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $roles = Role::all();
        return view('admin.role-users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoleUserStoreRequest $request)
    {
        try {
            $user = new Admin();
            $user->image = '';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $user->save(); 

            /** Assign Role user */
            $user->assignRole($request->role);

            /** send mail to the user */
            Mail::to($request->email)->send(new RoleUserCreateMail($request->email,$request->password));
            toast(__('Created Successfully'), 'success');

            return redirect()->route('admin.role-users.index');
        } catch (\Throwable $th) {
            throw $th;
        }       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.role-users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRoleUserUpdateRequest $request, string $id)
    {

        if ($request->has('password') && !empty($request->password)) {
            $request->validate([
                'password' => ['confirmed', 'min:6']
            ]);
        }

        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();


        /** assign the role to user */
        $user->syncRoles($request->role);

        toast(__('admin.Update Successfully!'), 'success');

        return redirect()->route('admin.role-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Admin::findOrFail($id);
        if($user->getRoleNames()->first() === 'Administrator') {
            return response(['status' => 'error','message'=>__('Deleted Successfully')]);
        }
        $user->delete();

        return response(['status'=>'success','message'=> __('Deleted Succesffully')]);
    }
}
