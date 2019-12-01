<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Blog;
use App\Tag;
use App\BlogTag;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.blog.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        $input = $request->all();

        $input['editor_id'] = Auth::user()->id;

        if(isset($input['image'])){
            $image = $input['image'];
            $destination = public_path('admin_assets/images/blog');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move($destination,$name);
            $input['image'] = $name;
        }

        $blog = Blog::create($input);

        if(isset($input['tags']) && $input['tags'] != null){
            for($i=0; $i<count($input['tags']); $i++){
                $blog_tags = [
                    'blog_id' => $blog->id,
                    'tag_id' => $input['tags'][$i]
                ];
                BlogTag::create($blog_tags);
            }
        }

        Session::flash('success','Blog Added Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($blog = Blog::find($id)){
            $tags = BlogTag::where('blog_id',$id)->get();
            return view('admin.blog.show',compact('tags','blog'));
        }else{
            Session::flash('danger','Reload page and try again!!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($blog = Blog::find($id)){
            $tags = Tag::all();
            $blogTags = BlogTag::where('blog_id',$id)->get();
            return view('admin.blog.edit',compact('blog','tags','blogTags'));
        }else{
            Session::flash('danger','Reload page and try again!!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        $input = $request->all();
        if($blog = Blog::find($id)){
            if(isset($input['image'])){
                $image = $input['image'];
                $destination = public_path('admin_assets/images/blog');
                $name = time().'.'.$image->getClientOriginalExtension();
                $image->move($destination,$name);
                $input['image'] = $name;
            }
            
            $blog->update($input);

            $tags = BlogTag::where('blog_id',$id)->get();
            foreach($tags as $tag){
                $tag->delete();
            }

            if(isset($input['tags']) && $input['tags'] != null){
                for($i=0; $i<count($input['tags']); $i++){
                    $blog_tags = [
                        'blog_id' => $blog->id,
                        'tag_id' => $input['tags'][$i]
                    ];
                    BlogTag::create($blog_tags);
                }
            }

            Session::flash('success','Blog Updated Successfully');
            return redirect()->back();
        }else{
            Session::flash('danger','Reload page and try again!!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($blog = Blog::find($id)){
            $blog->delete();
            Session::flash('success','Blog Deleted Successfully');
            return redirect()->back();
        }else{
            Session::flash('danger','Reload page and try again!!');
            return redirect()->back();
        }
    }
}
