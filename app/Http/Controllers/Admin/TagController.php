<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->get();
        return view('admin.tag.index',compact('tags'));
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
            'title' => 'required|max:255',
        ]);

        $input = $request->all();

        Tag::create($input);
        Session::flash('success','Tag Added Successfully');
        return redirect()->back();
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
            'title' => 'required|max:255',
        ]);

        $input = $request->all();
        if($Tag = Tag::find($id)){
            
            $Tag->update($input);
            Session::flash('success','Tag Updated Successfully');
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
        if($Tag = Tag::find($id)){
            $Tag->delete();
            Session::flash('success','Tag Deleted Successfully');
            return redirect()->back();
        }else{
            Session::flash('danger','Reload page and try again!!');
            return redirect()->back();
        }
    }
}