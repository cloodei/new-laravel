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

        $movie = Content::with('thuocnhieuGenre')->get();
        $movies = Content::with('thuocnhieuGenre')->get();

        return view('pages.movie.page', ['movie' => $movie, 'movies' => $movies, 'role' => $role, 'subscription_type' => $subscription_type]);
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

        if($movie->content_type === 'VIP'){
            if($subscription_type === 'free') {
                return redirect('/vip')->with('error', 'You do not have permission to access this content. Please upgrade your subscription.');
            }
        }

        return view('pages.movie.index', [ 'sameName' => $sameName, 'movies' => $movies, 'relatedContents' => $relatedContents, 'movie' => $movie, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function indexTV(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        $genres = [
            [
                "name" => "Action",
                "tvShows" => [
                    [
                        "title" => "Action Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Action Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Action Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Action Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Comedy",
                "tvShows" => [
                    [
                        "title" => "Comedy Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Comedy Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Comedy Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Comedy Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Drama",
                "tvShows" => [
                    [
                        "title" => "Drama Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Drama Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Drama Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Drama Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Sci-Fi",
                "tvShows" => [
                    [
                        "title" => "Sci-Fi Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ]
        ];
        $tvShows = [
            [
                "title" => "Action Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Action Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Action Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Action Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Comedy Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Comedy Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Comedy Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Comedy Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Drama Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Drama Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Drama Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Drama Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Sci-Fi Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Sci-Fi Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Sci-Fi Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Sci-Fi Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ]
        ];
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

        $tvShow = [
            "title" => "Action Show 1",
            "rating" => 5,
            "image" => Storage::url('public/images/movie1.jpg'),
            "description" => "Lorem ipsum dolor sit amet, consectetur adipis cing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
            "genre" => "Action",
        ];
        $genres = [
            [
                "name" => "Action",
                "tvShows" => [
                    [
                        "title" => "Action Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Action Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Action Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Action Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Comedy",
                "tvShows" => [
                    [
                        "title" => "Comedy Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Comedy Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Comedy Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Comedy Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Drama",
                "tvShows" => [
                    [
                        "title" => "Drama Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Drama Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Drama Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Drama Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Sci-Fi",
                "tvShows" => [
                    [
                        "title" => "Sci-Fi Show 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Show 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Show 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Show 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ]
        ];
        $tvShows = [
            [
                "title" => "Action Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Action Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Action Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Action Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Comedy Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Comedy Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Comedy Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Comedy Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Drama Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Drama Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Drama Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Drama Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Sci-Fi Show 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Sci-Fi Show 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Sci-Fi Show 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Sci-Fi Show 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ]
        ];
        return view('pages.tvShow.index', ['genres' => $genres, 'tvShow' => $tvShow, 'role' => $role, 'tvShows' => $tvShows, 'subscription_type' => $subscription_type]);
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
