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
        if(Auth::check() && Auth::user()->role == 'admin') {
            $user->delete();
            $users = User::all();
            return redirect()->route('users.index', ['users' => $users])->with('success', 'L\'utilisateur a bien été supprimé');
        }
        return redirect()->route('index')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
    }
}
