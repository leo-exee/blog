<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\UserFormRequest;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 'admin') {
            $users = User::all();
            return view('users.index', ['users' => $users]);
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function destroy(User $user)
    {
        if(Auth::user()->id == $user->id) {            
            return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer votre compte sur cette page');
        }
        if(Auth::check() && Auth::user()->role == 'admin') {
            $user->delete();
            $users = User::all();
            return redirect()->route('users.index', ['users' => $users])->with('success', 'L\'utilisateur a bien été supprimé');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }

    public function posts(User $user)
    {
        $posts = Post::where('user_id', $user->id)->get();
        
        return view('posts.filtered', ['filter' => $user->name, 'posts' => $posts]);
    }
}
