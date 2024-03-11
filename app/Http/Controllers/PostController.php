<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.post', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:225',
            'body' => 'required|min:10|max:500',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('img')) {
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move('storage/images/', $fileName);
            $request->user()->posts()->create([
                'title' => $request->title,
                'img' => $fileName,
                'body' => $request->body,
            ]);
            return redirect()->route('dashboard', ['page_type' => 'user-posts']);
        } else {
            return back();
        }

    }

    public function destory($id)
    {
        $img = Post::find($id)->img;

        if(file_exists(public_path('storage/images/'.$img))){
            unlink(public_path('storage/images/'.$img));
            Post::destroy($id);
        }
        return back();
    }

    public function show($id)
    {
       $post = Post::find($id);
        return view('posts.post-edit',['post' => $post]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:225',
            'body' => 'required|min:10|max:500'
        ]);
        Post::find($request->id)->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route("posts");
    }
}
