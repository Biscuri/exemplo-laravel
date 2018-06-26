<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $posts = $user->posts;

        return view('home', ['posts' => $posts]);
    }

    public function newPost(Request $request){
        $user = Auth::user();

        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->post = $request->post;
        $post->save();

        return redirect('home');
    }
}
