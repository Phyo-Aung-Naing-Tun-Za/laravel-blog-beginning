<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('posts.home');
    }
    public function dashboard(Request $request)
    {
        if(isset($_GET['page_type']) &&  $_GET['page_type'] ==  'user-posts'){
            $posts =   $request->user()->posts()->latest()->get();
            return view('posts.dashboard',['posts' => $posts]);
        }else{
            $users = $request->user()->latest()->paginate(5);
            return view('posts.dashboard',['users' => $users]);
        }
    }

    public function post()
    {
        return view('posts.post');
    }
}
