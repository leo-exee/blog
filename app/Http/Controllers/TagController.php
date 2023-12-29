<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\TagFormRequest;

use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            $tags = Tag::all();
            return view('tags.index', ['tags' => $tags]);
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function store(TagFormRequest $request)
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            if(Tag::where('name', $request->name)->exists()) {
                $tags = Tag::all();
                return redirect()->route('tags.index', ['tags' => $tags])->with('error', 'Le tag existe déjà');
            }
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->color = $request->color;
            $tag->save();

            $tags = Tag::all();
            return redirect()->route('tags.index', ['tags' => $tags])->with('success', 'Le tag a bien été ajouté');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function update(TagFormRequest $request, Tag $tag)
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            $existingTag = Tag::where('name', $request->name)->first();
            if ($existingTag && $existingTag->id !== $tag->id) {
                $tags = Tag::all();
                return redirect()->route('tags.index', ['tags' => $tags])->with('error', 'Le tag existe déjà');
            }
            $tag = Tag::find($tag->id);
            $tag->name = $request->name;
            $tag->color = $request->color;
            $tag->save();

            $tags = Tag::all();
            return redirect()->route('tags.index', ['tags' => $tags])->with('success', 'Le tag a bien été modifié');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function destroy(Tag $tag)
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            $tag->delete();
            $tags = Tag::all();
            return redirect()->route('tags.index', ['tags' => $tags])->with('success', 'Le tag a bien été supprimé');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function posts(Tag $tag)
    {
        $posts = Post::whereHas('tags', function($q) use ($tag) {
            $q->where('tag_id', $tag->id);
        })->get();
        return view('posts.filtered', ['filter' => $tag->name, 'posts' => $posts]);
    }
}
