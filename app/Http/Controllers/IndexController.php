<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Blog;
use App\Tag;
use App\BlogTag;
use App\Comment;
use Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index(){
        $blogs = Blog::orderBy('id','desc')->paginate(6);
        $lasts = Blog::orderBy('id','desc')->take(6)->get();
        $tags = Tag::take(15)->get();
        return view('front.index',compact('blogs','lasts','tags'));
    }
    
    public function search(Request $request){
        $input = $request->all();
        $blogs = Blog::where('title','like', $input['search'])->ORwhere('description','like', $input['search'])->ORwhere('content','like', $input['search'])->orderBy('id','desc')->paginate(6);
        $lasts = Blog::orderBy('id','desc')->take(6)->get();
        $tags = Tag::take(15)->get();
        return view('front.index',compact('blogs','lasts','tags'));
    }
    
    public function blog_details($title,$id){
        $blog = Blog::find($id);
        $lasts = Blog::orderBy('id','desc')->take(6)->get();
        $tags = Tag::take(15)->get();
        return view('front.details',compact('blog','lasts','tags'));
    }
    
    public function blog_tag($title,$id){
        $blogs = BlogTag::where('tag_id',$id)->orderBy('id','desc')->paginate(6);
        $lasts = Blog::orderBy('id','desc')->take(6)->get();
        $tags = Tag::take(15)->get();
        return view('front.tag',compact('blogs','lasts','tags'));
    }
    
    public function comment(Request $request){
        $this->validate($request,[
            'comment' => 'required',
            'blog_id' => 'required|exists:blogs,id'
        ]);
        $input = $request->all();
        if (Auth::guard('admin')->check()){
            $input['admin_id'] = Auth::guard('admin')->user()->id;
        }elseif(Auth::guard('web')->check()){
            $input['user_id'] = Auth::guard('web')->user()->id;
        }

        Comment::create($input);
        Session::flash('success','Comment Added Successfully');
        return redirect()->back();
    }
}
