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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'permission' => 'user',
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful.');
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
            return redirect()->intended()->with('success', 'Logged in successfully.');
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
