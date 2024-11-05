<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        $role = $request->attributes->get('role');
        if($role === 'guest') {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }
        $user = $request->user();
        return view('pages.userProfile.index', ['role' => $role, 'user' => $user]);
    }
}
