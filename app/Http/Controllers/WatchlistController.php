<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index(Request $request) {
        $role = $request->attributes->get('role');
        if($role === 'guest') {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        $watchedContent = Watchlist::where('user_id', Auth::id())
            ->with('content')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.watchlist.index', [
            'watchedContent' => $watchedContent,
            'role' => $role
        ]);
    }

    public function destroy(Request $request, $id) {
        $role = $request->attributes->get('role');
        if($role === 'guest') {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        $watchlist = Watchlist::find($id);
        if($watchlist->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You do not have permission to delete this item.');
        }

        $watchlist->delete();
        return redirect()->back()->with('success', 'Item removed from watchlist.');
    }
}