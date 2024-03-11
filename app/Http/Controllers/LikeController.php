<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store($id,Request $request)
    {
        $post = Post::find($id);
        $post->likes()->create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id,
        ]);
        echo "success";
    }

    public function destory($id)
    {
        $post = Post::find($id);
        $post->likes()->delete();
        echo "success";
    }

    public function test()
    {
        echo "hello";
    }
}
