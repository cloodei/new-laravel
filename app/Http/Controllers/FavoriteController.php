<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $role = $request->attributes->get('role');

        if ($role === 'guest') {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        $favorites = $user->favorites()->with('content')->get();

        return view('pages.favorite.index', compact('favorites', 'role'));
    }

    public function add($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add to favorites.');
        }

        $user = Auth::user();
        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('favorites.index')->with('error', 'Content not found.');
        }

        $favoriteExists = Favorite::where('user_id', $user->id)->where('content_id', $content->id)->exists();

        if (!$favoriteExists) {
            Favorite::create([
                'user_id' => $user->id,
                'content_id' => $content->id,
            ]);

            return redirect()->route('favorites.index')->with('success', 'The movie has been added to your favorites.');
        }

        return redirect()->route('favorites.index')->with('info', 'This movie is already in your favorites.');
    }

    public function remove($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to remove from favorites.');
        }

        $user = Auth::user();
        $favorite = Favorite::where('user_id', $user->id)->where('content_id', $id)->first();

        if ($favorite) {
            $favorite->delete();

            return redirect()->route('favorites.index')->with('success', 'The movie has been removed from your favorites.');
        }

        return redirect()->route('favorites.index')->with('error', 'Favorite not found.');
    }
}