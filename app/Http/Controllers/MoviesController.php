<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Season;
use App\Models\Content_genre;

class MoviesController extends Controller
{
    public function homePage(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        $categories = Category::with('content')->orderBy('id', 'DESC')->get();

        return view('pages.homepage', ['categories' => $categories, 'role' => $role, 'subscription_type' => $subscription_type, 'user' => $user]);
    }
    
    public function index(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        $genres = Genre::with(['content' => function($query) {
            $query->where('activate', 1)->whereNull('season_id');
        }])->get();

        $movies = Content::where('activate', 1)->whereNull('season_id')->get();

        return view('pages.movie.page', ['genres' => $genres, 'movies' => $movies, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function show(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }

        $movie = Content::with('thuocnhieuGenre')->findOrFail($id);
        $movies = Content::where('id', '!=', $movie->id)
        ->where('title', '!=', $movie->title)
        ->whereHas('season', function ($query) { $query->where('season_number', 1); })->get()->unique('id');
        $genres = $movie->thuocnhieuGenre;

        $sameName = Content::where('title', $movie->title)->where('id', '!=', $movie->id)->with('season')->get()->unique('id');;

        $relatedContents = Content::whereHas('thuocnhieuGenre', function ($query) use ($genres) {
            $query->whereIn('genres.id', $genres->pluck('id'));})
            ->where('id', '!=', $movie->id)
            ->where('title', '!=', $movie->title)
            ->whereHas('season', function ($query) { $query->where('season_number', 1); })->get()->unique('id');

        if($movie->content_type === 'VIP' && $subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
        }

        return view('pages.movie.index', ['genres' => $genres, 'sameName' => $sameName, 'movies' => $movies, 'relatedContents' => $relatedContents, 'movie' => $movie, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function indexTV(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        $genres = Genre::with(['content' => function($query) {
            $query->where('activate', 1)->whereNotNull('season_id');
        }])->get();

        $tvShows = Content::where('activate', 1)->whereNotNull('season_id')->get();

        return view('pages.tvShow.page', ['genres' => $genres, 'tvShows' => $tvShows, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function showTV(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }
        if($subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
        }

        $tvShow = Content::with('thuocnhieuGenre')->findOrFail($id);
        $tvShows = Content::where('id', '!=', $tvShow->id)->where('title', '!=', $tvShow->title)->whereNotNull('season_id')->get();
        $genres = $tvShow->thuocnhieuGenre;
        $n = $tvShows->count();
        $otherTVShows = [];
        for($i = 0; $i < $n; $i++) {
            $otherTVShows[$i] = $tvShows[$n - $i - 1];
        }
        return view('pages.tvShow.index', ['genres' => $genres, 'tvShow' => $tvShow, 'role' => $role, 'tvShows' => $tvShows, 'subscription_type' => $subscription_type, 'otherTVShows' => $otherTVShows]);
    }

    public function watchIndex(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }
        if($subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
        }

        $movie = Content::with('thuocnhieuGenre')->findOrFail($id);
        $movies = Content::all();
        $sameName = Content::where('title', $movie->title)->where('id', '!=', $movie->id)->with('season')->get()->unique('id');;

        DB::table('watchlist')->updateOrInsert(
            [
                'user_id' => Auth::id(),
                'content_id' => $id,
            ],
        );

        return view('pages.watch.index', [ 'sameName' => $sameName, 'movies' => $movies, 'role' => $role, 'subscription_type' => $subscription_type, 'movie' => $movie ]);
    }
}
