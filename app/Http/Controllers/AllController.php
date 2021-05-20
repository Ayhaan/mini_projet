<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Role;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function admin()
    {
        $avatars = Avatar::all()->slice(1);
        $roles = Role::all();
        return view('admin/dashboard', compact('avatars', 'roles'));
    }
}
