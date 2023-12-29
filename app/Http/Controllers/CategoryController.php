<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            $categories = Category::all();
            return view('categories.index', ['categories' => $categories]);
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function store(CategoryFormRequest $request)
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            if(Category::where('name', $request->name)->exists()) {
                $categories = Category::all();
                return redirect()->route('categories.index', ['categories' => $categories])->with('error', 'La catégorie existe déjà');
            }
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            $categories = Category::all();
            return redirect()->route('categories.index', ['categories' => $categories])->with('success', 'La catégorie a bien été ajoutée');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            $existingCategory = Category::where('name', $request->name)->first();
            if($existingCategory && $existingCategory->id !== $category->id) {
                $categories = Category::all();
                return redirect()->route('categories.index', ['categories' => $categories])->with('error', 'La catégorie existe déjà');
            }
            $category = Category::find($category->id);
            $category->name = $request->name;
            $category->save();

            $categories = Category::all();
            return redirect()->route('categories.index', ['categories' => $categories])->with('success', 'La catégorie a bien été modifiée');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function destroy(Category $category)
    {
        if(Auth::check() && Auth::user()->role == 'admin') {

            $posts = Post::where('category_id', $category->id)->get();
            if(!$posts->isEmpty()) {
                $categories = Category::all();
                return redirect()->route('categories.index', ['categories' => $categories])->with('error', 'La catégorie ne peut pas être supprimée car elle est utilisée par un ou plusieurs articles');
            }

            $category->delete();
            $categories = Category::all();
            return redirect()->route('categories.index', ['categories' => $categories])->with('success', 'La catégorie a bien été supprimée');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function posts(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        return view('posts.filtered', ['filter' => $category->name, 'posts' => $posts]);
    }
}
