<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{
    public function index(){

        $posts = \App\Blogs::where('status', 'active')->latest()->get();
        $users = \App\User::all();
        return view('posts.index', compact('posts', 'users'));
    }

    public function show($id){

        $post = \App\Blogs::find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        //dd(request()->all());
        $post = new \App\Blogs;

        $post->user_id = Session::get('id');
        $post->title = request('title');
        $post->description = request('description');
        $post->status = 'pending';

        $post->save();

        return redirect('/');
    }
}
