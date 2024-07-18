<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use App\Http\Requests\AdminNewsUpdateRequest;
use App\Models\Language;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.news.index',compact('languages'));
    }
    /* 
        Fetch category depending on language
    */
    public function fetchCategory(Request $request) {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.news.create',compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminNewsCreateRequest $request)
    {
        // dd($request->all());
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $new = new News();
        $new->language = $request->language;
        $new->category_id = $request->category;
        $new->auther_id = Auth::guard('admin')->user()->id;
        $new->image = $imagePath;
        $new->title = $request->title;
        $new->slug = Str::slug($request->title);
        $new->content = $request->content;
        $new->meta_title = $request->meta_title;
        $new->meta_description = $request->meta_description;
        $new->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $new->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $new->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $new->status = $request->status == 1 ? 1 : 0;
        $new->save();

        $tags = explode(',',$request->tags);
        $tagIds = [];

        foreach($tags as $tag) {

            $item = new Tag();
            $item->name =$tag;
            $item->save();

            $tagIds[] = $item->id;
        }

        $new->tags()->attach($tagIds);
        toast(__('Created Successfully!'), 'success')->width('450');
        return redirect()->route('admin.news.index');
    }

    /**
     * Change toggle status of news
     */
    public function toggleNewsStatus(Request $request){
        try {
            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();

            return response(['status' => 'success', 'message' => __('Updated success')]);
        }catch(\Throwable $th) {
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
    public function edit(string $id)
    {
        $languages = Language::all();
        $news = News::findOrFail($id);
        $categories = Category::where('language',$news->language)->get();
        return view('admin.news.edit',compact('languages','news','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminNewsUpdateRequest $request, string $id)
    {        
        $new = News::findOrFail($id);

        $imagePath = $this->handleFileUpload($request, 'image');
        
        $new->language = $request->language;
        $new->category_id = $request->category;
        $new->image = !empty($imagePath) ? $imagePath : $new->image;
        $new->title = $request->title;
        $new->slug = Str::slug($request->title);
        $new->content = $request->content;
        $new->meta_title = $request->meta_title;
        $new->meta_description = $request->meta_description;
        $new->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $new->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $new->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $new->status = $request->status == 1 ? 1 : 0;
        $new->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        $new->tags()->detach($new->tags);

        foreach ($tags as $tag) {

            $item = new Tag();
            $item->name = $tag;
            $item->save();

            $tagIds[] = $item->id;
        }

        $new->tags()->attach($tagIds);
        toast(__('Updated Successfully!'), 'success')->width('450');
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteFile($news->image);
        $news->delete();

        return response(['status'=>'success','message'=> __('Deleted Successfully!')]);
    }

    /*
        Copy News
    */
    public function copyNews(string $id) {
        $news = News::findOrFail($id);
        $copyNews = $news->replicate();
        $copyNews->save();

        toast(__('Copied Successfully!'), 'success');
        return redirect()->back();
    }
}
