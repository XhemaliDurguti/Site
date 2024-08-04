<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tag;
use App\Models\Comment;
use App\Http\Controllers\Frontend\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $breakingNews  = News::where(['is_breaking_news' => 1,])
            ->ActiveEntries()->WithLocalize()->orderBy('id','DESC')->take(10)->get();

        $heroSlider = News::with(['category'])
            ->where('show_at_slider',1)
            ->ActiveEntries()
            ->withLocalize()
            ->orderBy('id','DESC')->take(7)
            ->get();

        return view('frontend.home',compact('breakingNews','heroSlider'));
    }

    public function ShowNews(string $slug){
        $news = News::with(['auther','tags','comments'])->where('slug',$slug)->ActiveEntries()->WithLocalize()->first();
        $this->countView($news);

        $recentNews = News::with(['category','auther'])->where('slug','!=',$news->slug)
            ->ActiveEntries()->WithLocalize()->orderBy('id','DESC')->take(4)->get();

        $mostCommonTags = $this->mostCommonTags();

        $nextPost = News::where('id','>',$news->id)
            ->ActiveEntries()
            ->WithLocalize()
            ->orderBy('id','asc')
            ->first();

        $previousPost = News::where('id', '<', $news->id)
            ->ActiveEntries()
            ->WithLocalize()
            ->orderBy('id', 'desc')
            ->first();

        $relatedPost = News::where('slug','!=',$news->slug)
            ->where('category_id',$news->category_id)
            ->ActiveEntries()
            ->WithLocalize()
            ->take(5)
            ->get();

        return view('frontend.news-details',compact('news', 'recentNews', 'mostCommonTags','nextPost','previousPost', 'relatedPost'));
    }

    public function countView($news){

        if(session()->has('viewed_posts')) {
            $postIds = session('viewed_posts');

            if(!in_array($news->id,$postIds)){
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts'=>$postIds]);
        }else {
            session(['viewed_posts'=>[$news->id]]);
            $news->increment('views');
        }
        // $news->increment('views');
    }
    public function mostCommonTags(){
        return Tag::select('name', \DB::raw('COUNT(*) as count'))
        ->where('language', getLanguage())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function handleComment(Request $request) {
        $request->validate([
            'comment' => ['required','string','max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();

        toast(__('Comment add successfully!'),'success');
        return redirect()->back();
    }

    public function handleReplay(Request $request) {
        $request->validate([
            'replay' => ['required', 'string', 'max:1000']
        ]);
        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->replay;
        $comment->save();
        toast(__('Comment replay successfully!'), 'success');
        return redirect()->back();
    }

    public function commentDestroy(Request $request){
        //dd($request->all());
        $comment = Comment::findOrFail($request->id);
        if(Auth::user()->id === $comment->user_id){
            $comment->delete();
            return response(['status'=>'success','message'=>'Comment Delete Successfully!']);
        }
        return response(['status' => 'error', 'message' => 'Somthing went wrong!']);
    }
}
