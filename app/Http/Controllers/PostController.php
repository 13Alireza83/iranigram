<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index',[
           'posts'=>$posts,
        ]);

    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required','string','max:1000'],
        ]);
        $request->user()->posts()->create($validated);
        return redirect()->route('posts.index')->with('status','post-created');
    }
}
