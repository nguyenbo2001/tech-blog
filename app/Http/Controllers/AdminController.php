<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $comments = Comment::latest()->take(10)->get();
        $posts = Post::latest()->take(10)->get();

        return view('admin.home', compact('comments', 'posts'));
    }
}
