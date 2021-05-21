<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);  //stytème de pagniate
        return view('admin.user.main', compact('users'));
    }

    public function edit(User $user)
    {
        $avatars = Avatar::all()->slice(1);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'avatars', 'roles'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('isAdmin');
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|numeric',
            'email' => 'required|string',
            'avatar_id' => 'required',
        ]);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->avatar_id = $request->avatar_id;
        if (Auth::user()->role_id == 1) {
            $user->role_id = $request->role_id;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profil a bien été modifié');
    }
    public function updateMembre(User $user, Request $request)
    {
        $this->authorize('isRealUser', $user);
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|numeric',
            'email' => 'required|string',
            'avatar_id' => 'required',
        ]);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->avatar_id = $request->avatar_id;

        $user->save();
        return redirect()->back()->with('success', 'Profil a bien été modifié');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('warning', 'Utilisateur bien supprimé !');
    }


}
