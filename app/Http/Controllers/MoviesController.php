<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    public function homePage(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        $genres = [
            [
                "name" => "Action",
                "movies" => [
                    [
                        "title" => "Action Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Action Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Action Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Action Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ],
                    [
                        "title" => "Action Movie 5",
                        "rating" => 1,
                        "image" => Storage::url('public/images/movie5.jpeg')
                    ],
                    [
                        "title" => "Action Movie 6",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie6.jpg')
                    ]
                ]
            ],
            [
                "name" => "Comedy",
                "movies" => [
                    [
                        "title" => "Comedy Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 5",
                        "rating" => 1,
                        "image" => Storage::url('public/images/movie5.jpeg')
                    ],
                    [
                        "title" => "Comedy Movie 6",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie6.jpg')
                    ]
                ]
            ],
            [
                "name" => "Drama",
                "movies" => [
                    [
                        "title" => "Drama Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Drama Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Drama Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Drama Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ],
                    [
                        "title" => "Drama Movie 5",
                        "rating" => 1,
                        "image" => Storage::url('public/images/movie5.jpeg')
                    ],
                    [
                        "title" => "Drama Movie 6",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie6.jpg')
                    ]
                ]
            ],
            [
                "name" => "Sci-Fi",
                "movies" => [
                    [
                        "title" => "Sci-Fi Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 5",
                        "rating" => 1,
                        "image" => Storage::url('public/images/movie5.jpeg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 6",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie6.jpg')
                    ]
                ]
            ]
        ];
        return view('pages.homepage', ['genres' => $genres, 'role' => $role, 'subscription_type' => $subscription_type]);
    }
    
    public function index(Request $request) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        $genres = [
            [
                "name" => "Action",
                "movies" => [
                    [
                        "title" => "Action Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Action Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Action Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Action Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Comedy",
                "movies" => [
                    [
                        "title" => "Comedy Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Drama",
                "movies" => [
                    [
                        "title" => "Drama Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Drama Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Drama Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Drama Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Sci-Fi",
                "movies" => [
                    [
                        "title" => "Sci-Fi Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ]
        ];
        $movies = [
            [
                "title" => "Action Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Action Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Action Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Action Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Comedy Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Comedy Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Comedy Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Comedy Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Drama Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Drama Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Drama Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Drama Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ]
        ];
        return view('pages.movie.page', ['genres' => $genres, 'movies' => $movies, 'role' => $role, 'subscription_type' => $subscription_type]);
    }

    public function show(Request $request, $id) {
        $role = $request->attributes->get('role');
        $subscription_type = $request->attributes->get('subscription_type');

        if($role === 'guest') {
            return redirect('/login')->with('error', 'You do not have permission to access this page.');
        }
        if($subscription_type === 'free') {
            return redirect('/vip')->with('error', 'You do not have permission to access this page. Please upgrade your subscription.');
        }

        $movie = [
            "title" => "Action Movie 1",
            "rating" => 5,
            "image" => Storage::url('public/images/movie1.jpg'),
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nislsed, ac tincidunt nisl donec. Sed ac nislsed, ac tincidunt nisl donec. Sed ac nislsed, ac tincidunt nisl donec. Sed ac nislsed, ac tincidunt nisl donec.",
            "genre" => "Action",
        ];
        $genres = [
            [
                "name" => "Action",
                "movies" => [
                    [
                        "title" => "Action Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Action Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Action Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Action Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Comedy",
                "movies" => [
                    [
                        "title" => "Comedy Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Comedy Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Drama",
                "movies" => [
                    [
                        "title" => "Drama Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Drama Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Drama Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Drama Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ],
            [
                "name" => "Sci-Fi",
                "movies" => [
                    [
                        "title" => "Sci-Fi Movie 1",
                        "rating" => 5,
                        "image" => Storage::url('public/images/movie1.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 2",
                        "rating" => 4,
                        "image" => Storage::url('public/images/movie2.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 3",
                        "rating" => 3,
                        "image" => Storage::url('public/images/movie7.jpg')
                    ],
                    [
                        "title" => "Sci-Fi Movie 4",
                        "rating" => 2,
                        "image" => Storage::url('public/images/movie4.jpg')
                    ]
                ]
            ]
        ];
        $movies = [
            [
                "title" => "Action Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Action Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Action Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Action Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Comedy Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Comedy Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Comedy Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Comedy Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Drama Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Drama Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Drama Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Drama Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 1",
                "rating" => 5,
                "image" => Storage::url('public/images/movie11.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 2",
                "rating" => 4,
                "image" => Storage::url('public/images/movie12.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 3",
                "rating" => 3,
                "image" => Storage::url('public/images/movie13.jpg')
            ],
            [
                "title" => "Sci-Fi Movie 4",
                "rating" => 2,
                "image" => Storage::url('public/images/movie14.jpg')
            ]
        ];
        return view('pages.movie.index', ['genres' => $genres, 'movie' => $movie, 'role' => $role, 'movies' => $movies, 'subscription_type' => $subscription_type]);
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
            return redirect('/vip')->with('error', 'You do not have permission to access this page. Please upgrade your subscription.');
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
}
