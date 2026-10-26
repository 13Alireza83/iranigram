<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->input('q');

        $users = collect();
        $posts = collect();

        if ($query && strlen($query) >= 2) {
            $users = User::where('name', 'like', "%{$query}%")
                ->orWhere('bio', 'like', "%{$query}%")
                ->limit(10)
                ->get();

            $posts = Post::with('user')
                ->where('body', 'like', "%{$query}%")
                ->latest()
                ->limit(10)
                ->get();
        }

        return view('search.index', [
            'query' => $query,
            'users' => $users,
            'posts' => $posts,
        ]);
    }
}
