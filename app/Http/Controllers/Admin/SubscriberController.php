<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:subscriber index,admin'])->only(['index']);
        $this->middleware(['permission:subscriber create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:subscriber update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:subscriber delete,admin'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subs = Subscriber::all();
        return view('admin.subscriber.index',compact('subs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required','max:255'],
            'message'=>['required']
        ]);

        $subscribers = Subscriber::pluck('email')->toArray();

        Mail::to($subscribers)->send(new Newsletter($request->subject,$request->message));
        
        toast(__('Mail Sended successfully'),'success');

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subscriber::findOrFail($id)->delete();

        return response(['status'=>'success','message'=>__('Deleted Succesffully')]);
    }
}
