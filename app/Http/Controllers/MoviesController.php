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
use App\Models\Favorite;

class MoviesController extends Controller
{
    public function homePage(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        $categories = Category::with(['content' => function ($query) { 
            $query->whereHas('season', function ($subquery) {
                $subquery->where('season_number', 1);
            })->inRandomOrder();
        }])->orderBy('id', 'ASC')->get();

        return view('pages.homepage', ['categories' => $categories, 'role' => $role, 'subscription_type' => $subscription_type, 'user' => $user]);
    }
    
    public function index(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        $genres = Genre::with(['content' => function($query) {
            $query->where('activate', 1)->whereNull('season_id')->inRandomOrder();
        }])->get();

        $movies = Content::where('activate', 1)->whereNull('season_id')->inRandomOrder()->get();
        $moviess = Content::where('activate', 1)->whereNull('season_id')->inRandomOrder()->get();
        // dd($movies);
        $favorites = $user->favorites->pluck('content_id');
        return view('pages.movie.page', [ 'favorites' => $favorites, 'genres' => $genres, 'movies' => $movies, 'moviess' => $moviess, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function show(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }

        $movie = Content::with('thuocnhieuGenre')->findOrFail($id);
        $movies = Content::where('id', '!=', $movie->id)
        ->where('title', '!=', $movie->title)
        ->whereNull('season_id')->inRandomOrder()->get()->unique('id');
        $genres = $movie->thuocnhieuGenre;

        $relatedContents = Content::whereHas('thuocnhieuGenre', function ($query) use ($genres) {
            $query->whereIn('genres.id', $genres->pluck('id'));})
            ->where('title', '!=', $movie->title)->whereNull('season_id')->inRandomOrder()->get()->unique('id');

        if($movie->content_type === 'VIP' && $subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
        }
        $favorites = $user->favorites->pluck('content_id');

        return view('pages.movie.index', [ 'favorites' => $favorites, 'genres' => $genres, 'movies' => $movies, 'relatedContents' => $relatedContents, 'movie' => $movie, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function indexTV(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        $genres = Genre::with(['content' => function($query) {
            $query->where('activate', 1)->whereNotNull('season_id')->where('season_id', 1)->inRandomOrder();
        }])->get();

        $tvShows = Content::where('activate', 1)->whereNotNull('season_id')->where('season_id', 1)->inRandomOrder()->get();
        $tvShows1 = Content::where('activate', 1)->whereNotNull('season_id')->where('season_id', 1)->inRandomOrder()->get();
        // dd($genres);
        $favorites = $user->favorites->pluck('content_id');
        return view('pages.tvShow.page', [ 'favorites' => $favorites, 'genres' => $genres, 'tvShows' => $tvShows, 'tvShows1' => $tvShows1, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function showTV(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }
        if($subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
        }

        $tvShow = Content::with('thuocnhieuGenre')->findOrFail($id);
        $tvShows = Content::where('id', '!=', $tvShow->id)->where('title', '!=', $tvShow->title)->where('season_id', 1)->whereNotNull('season_id')->inRandomOrder()->get();
        $genres = $tvShow->thuocnhieuGenre;
        $n = $tvShows->count();
        $otherTVShows = [];
        for($i = 0; $i < $n; $i++) {
            $otherTVShows[$i] = $tvShows[$n - $i - 1];
        }
        $favorites = $user->favorites->pluck('content_id');
        return view('pages.tvShow.index', [ 'favorites' => $favorites, 'genres' => $genres, 'tvShow' => $tvShow, 'role' => $role, 'tvShows' => $tvShows, 'subscription_type' => $subscription_type, 'otherTVShows' => $otherTVShows]);
    }

    public function watchIndex(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');
        $user = $request->user();

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }
        if($subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
        }

        $movie = Content::with('thuocnhieuGenre')->findOrFail($id);
        $movies = Content::where('id', '!=', $movie->id)->where('title', '!=', $movie->title)->where(function ($query) {$query->where('season_id', 1)->orWhereNull('season_id');})->inRandomOrder()->get();
        $sameName = Content::where('title', $movie->title)->where('id', '!=', $movie->id)->with('season')->get()->unique('id');;
        $favorites = $user->favorites->pluck('content_id');
        // dd($favorites);

        DB::table('watchlist')->updateOrInsert(
            [
                'user_id' => Auth::id(),
                'content_id' => $id,
            ],
        );

        return view('pages.watch.index', [ 'favorites' => $favorites, 'sameName' => $sameName, 'movies' => $movies, 'role' => $role, 'subscription_type' => $subscription_type, 'movie' => $movie ]);
    }

    public function getSearch(Request $request)
    {
        $role = $request->attributes->get('role');
        $searchTerm = strtolower($request->input('search'));
        $allMovies = collect();
    
        if ($searchTerm) {
            $genres = Genre::whereRaw('LOWER(name) LIKE ?', ['%' . $searchTerm . '%'])->get();
    
            if ($genres->isNotEmpty()) {
                $movies = Content::whereHas('thuocnhieuGenre', function ($query) use ($genres) {
                    $query->whereIn('genres.id', $genres->pluck('id'));
                })
                ->where(function ($query) {
                    $query->where('season_id', 1)
                        ->orWhereNull('season_id');
                })
                ->with('thuocnhieuGenre')
                ->get();
    
                $allMovies = $allMovies->merge($movies);
            }
    
            $moviesByTitle = Content::whereRaw('LOWER(title) LIKE ?', ['%' . $searchTerm . '%'])
                ->where(function ($query) {
                    $query->where('season_id', 1)
                        ->orWhereNull('season_id');
                })
                ->with('thuocnhieuGenre')
                ->get();
                
            $allMovies = $allMovies->merge($moviesByTitle);
        }
    
        $allMovies = $allMovies->unique('id');
    
        return view('pages.search', ['role' => $role, 'movies' => $allMovies]);
    }    
}
