<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('posts/list', ['posts' => Post::where('user_id', Auth::user()->id)->get()]);
    }

    public function create()
    {
        return view('posts/add', ['post' => new Post(), 'categories' => Category::all(), 'tags' => Tag::all()]);
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if(isset($request->image)) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $fileName);
            $post->image = $fileName;
        }

        if(Category::find($request->input('category_id')) == null) {
            return redirect()->route('posts.create')->with('error', 'La catégorie n\'existe pas');
        }
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->input('category_id');
        $post->save();
        $post->tags()->sync($request->input('tags'));
        
        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Article créé avec succès !');
    }

    public function show(Post $post)
    {
        return view('posts/post', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        if(Auth::user() != $post->user && Auth::user()->role != 'admin') {
            return redirect()->route('index')->with('error', 'Vous ne pouvez pas modifier un article qui ne vous appartient pas');
        }
        return view('posts/edit', ['post' => $post, 'categories' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, Post $post)
    {
        if(Auth::user() != $post->user && Auth::user()->role != 'admin') {
            return redirect()->route('index')->with('error', 'Vous ne pouvez pas modifier un article qui ne vous appartient pas');
        }

        if(isset($request->image)) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $fileName);
            $post->image = $fileName;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if(Category::find($request->input('category_id')) == null) {
            return redirect()->route('posts.edit', ['post' => $post->id])->with('error', 'Category not found');
        }
        $post->category_id = $request->input('category_id');
        $post->save();
        $post->tags()->sync($request->input('tags'));

        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Article modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(Auth::user() != $post->user && Auth::user()->role != 'admin') {
            return redirect()->route('index')->with('error', 'Vous ne pouvez pas supprimer un article qui ne vous appartient pas');
        }
        $post->delete();
        return redirect()->route('profile.edit')->with('success', 'Article supprimé avec succès !');
    }
}
