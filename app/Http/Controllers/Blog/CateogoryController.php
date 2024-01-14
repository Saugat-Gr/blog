<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CateogoryController extends Controller
{
 public function index(){
     $categories = Category::paginate(10);
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

   public function edit(Category $category){

     return view('blog.categories.edit', compact('category'));

   }

    public function update(Request $request, Category $category){
 
          $request->validate([
            'name' => 'required'
          ]);

           $category->update([
            'name' => $request->name
           ]);

           $category->save();

            return redirect()->route('blog.categories.index');
}

  public function destroy(Category $category){

        if($category->posts()->count()){
             return back()->withErrors(['error'=>'This category has posts.']);
        }

         $category->delete();

          return redirect()->route('blog.categories.index');

  }

}
