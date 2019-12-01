<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Blog;
use App\Tag;
use App\Comment;
use App\User;

class MainController extends Controller
{
    public function index(Request $request){
        if ($request->isMethod('POST')) {

            $user = Auth::user();
            if($request['email'] != null || $request['password'] != null){

                if($request['email'] != null){
                    $user->email = $request['email'];
                }

                if($request['password'] != null){
                    $user->password = bcrypt($request['password']);
                }
                
                
                $user->update();
                Session::flash('success','Updated Successfully');
            }else{
                Session::flash('danger','Must Insert One Of Inputs');

            }
            return redirect()->back();
        }

        $blog = Blog::count();
        $tag = Tag::count();
        $comment = Comment::count();
        $user = User::count();
        return view('admin.home',compact('blog','tag','comment','user'));
    }
}
