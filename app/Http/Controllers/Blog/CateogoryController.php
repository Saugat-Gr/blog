<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CateogoryController extends Controller
{
 public function index(){
     $categories = Category::all();
     return view('blog.categories.index', compact('categories'));
 }

  public function create(){
     return view('blog.categories.create');
  }

  public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

         $category = new Category();
         $category->name = $request->name;
         $category->save();

        return redirect()->route('blog.categories.index');
  }

}
