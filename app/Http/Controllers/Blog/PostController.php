<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index()
      {
          $posts = Post::with('category', 'tag')->paginate(10);
 
          dd($posts);
      }
}
