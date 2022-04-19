<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
        ]);

       $post = new Post;
       $post->title = $request->title;
       $post->author = $request->author;
       $post->description = $request->description;
       $post->save();
       if( $post->save()){
           $notification=array(
               'messege'=>'Post Added succesfully',
               'alert-type'=>'success'
           );
           return Redirect()->back()->with( $notification);
       }else{
           return redirect()->back();
       }
    }
    public function allPost(){
        echo "all post";
    }
}
