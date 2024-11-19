<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Content; // Use Content model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Determine the user's role
        $role = $user->role;  // Assuming 'role' is a column in your users table
        
        // Get the user's favorites with related content
        $favorites = $user->favorites()->with('content')->get();

        // Pass the favorites and role to the view
        return view('pages.favorite.index', compact('favorites', 'role'));
    }

    public function add($id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the content already exists in the user's favorites
            $content = Content::findOrFail($id);
            $favorite = Favorite::where('user_id', $user->id)->where('content_id', $content->id)->first();

            if (!$favorite) {
                // If not, add it to the favorites
                $favorite = new Favorite();
                $favorite->user_id = $user->id;
                $favorite->content_id = $content->id;
                $favorite->save();
            }

            // Redirect to favorites page after adding
            return redirect()->route('favorites.index')->with('success', 'The movie has been added to your favorites.');
        }

        // If the user is not logged in, redirect to login
        return redirect()->route('login')->with('error', 'Please log in to add to favorites.');
    }

    public function remove($id)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Find the favorite record
            $favorite = Favorite::where('user_id', $user->id)->where('content_id', $id)->first();

            if ($favorite) {
                // Delete the favorite
                $favorite->delete();
                return redirect()->route('favorites.index')->with('success', 'The movie has been removed from your favorites.');
            }

            return redirect()->route('favorites.index')->with('error', 'Favorite not found.');
        }

        // If the user is not logged in, redirect to login
        return redirect()->route('login')->with('error', 'Please log in to remove from favorites.');
    }
}