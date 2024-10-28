<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    public function index(Request $request) {
        $role = $request->attributes->get('role');
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
        return view('pages.movie.page', ['genres' => $genres, 'movies' => $movies, 'role' => $role]);
    }

    public function show(Request $request, $id) {
        $role = $request->attributes->get('role');
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
        return view('pages.movie.index', ['genres' => $genres, 'movie' => $movie, 'role' => $role, 'movies' => $movies]);
    }

    public function indexTV(Request $request) {
        $role = $request->attributes->get('role');
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
        return view('pages.tvShow.page', ['genres' => $genres, 'tvShows' => $tvShows, 'role' => $role]);
    }

    public function showTV(Request $request, $id) {
        $role = $request->attributes->get('role');
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
        return view('pages.tvShow.index', ['genres' => $genres, 'tvShow' => $tvShow, 'role' => $role, 'tvShows' => $tvShows]);
    }
}
