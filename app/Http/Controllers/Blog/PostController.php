<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
         $posts = Post::with('category')->paginate();

         return view('blog.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => ['required'],
            'image' => ['nullable', 'max:2028', 'image'],
            'description' => ['required'],
            'category' => ['required', 'integer', 'exists:categories,id'],
         ]);

          if($request->has('image')){
             $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
             $request->file('image')->storeAs('uploads', $fileName, 'public');
          }

           $post = auth()->user()->posts()->create([
              'title' => $request->title,
              'description' => $request->description,
              'category_id' => $request->category,
              'image' => $fileName ?? null,

           ]);
           
            return redirect()->route('blog.posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            $post = Post::findOrFail($id);
            return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         $categories = Category::paginate(10);

        return view('blog.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required'],
            'image' => ['nullable', 'max:2028', 'image'],
            'description' => ['required'],
            'category' => ['required', 'integer', 'exists:categories,id'],
         ]);

         if ($request->has('image')) {
            Storage::delete('public/uploads/' . $post->image);
            
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $fileName, 'public');
        }

         $post->update([
        'title' => $request->title,
        'image' => $fileName ?? $post->image,
        'description' => $request->description,
        'category_id' => $request->category

         ]);

          $post->save();
           return redirect()->route('blog.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
         if($post->image){
             Storage::delete('public/uploads/'. $post->image);
    }
      $post->delete();
      return redirect()->route('blog.posts.index');
}
}
