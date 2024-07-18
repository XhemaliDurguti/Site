<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.category.index',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.category.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCategoryCreateRequest $request)
    {
        $cate = new Category();
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->language = $request->language;
        $cate->show_at_nav = $request->show_at_nav;
        $cate->status = $request->status;
        $cate->save();
        
        toast(__('Category created  Successfully!'), 'success')->width('350');

        return redirect()->route('admin.category.index');
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
    public function edit(string $id)
    {
        $languages = Language::all();
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('languages','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCategoryUpdateRequest $request, string $id)
    {
        $cate = Category::findOrFail($id);
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->language = $request->language;
        $cate->show_at_nav = $request->show_at_nav;
        $cate->status = $request->status;
        $cate->save();

        toast(__('Category update  Successfully!'), 'success')->width('350');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $category = Category::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);
        }catch(\Throwable $th) {
            return response(['status'=>'error','message'=>__('Somthing wrong!')]);
        }
    }
}
