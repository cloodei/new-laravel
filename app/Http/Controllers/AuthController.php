<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerIndex() {
        return view('pages.registerUser');
    }

    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'permission' => 'user',
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function loginIndex() {
        return view('pages.login');
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($fields)) {
            $user = Auth::user();
    
            if($user->email === 'admin@admin' && Hash::check('admin', $user->password)) {
                $user->permission = 'admin';
                return redirect('/admin')->with('success', 'Logged in successfully.');
            }
            
            $user->permission = 'user';
            return redirect('/')->with('success', 'Logged in successfully.');
        }
    
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
