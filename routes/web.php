<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AssignGuestRole;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SeasonController;

Route::middleware([AssignGuestRole::class])->group(function () {
    // admin routes
    Route::prefix('admin')->group(function() {
        Route::get('/', function(Request $request) {
            $role = $request->attributes->get('role');
            if ($role !== 'admin') {
                return redirect()->back()->with('error', 'You do not have permission to access this page.');
            }
            return view('admin.dashboard');
        });
        // Route::get('/categories', function(Request $request) {
        //     $role = $request->attributes->get('role');
        //     if ($role !== 'admin') {
        //         return redirect()->back()->with('error', 'You do not have permission to access this page.');
        //     }
        //     return view('admin.categories');
        // });
        // Route::get('/tvshows', function(Request $request) {
        //     $role = $request->attributes->get('role');
        //     if ($role !== 'admin') {
        //         return redirect()->back()->with('error', 'You do not have permission to access this page.');
        //     }
        //     return view('admin.shows');
        // });
        // Route::get('/movies', function(Request $request) {
        //     $role = $request->attributes->get('role');
        //     if ($role !== 'admin') {
        //         return redirect()->back()->with('error', 'You do not have permission to access this page.');
        //     }
        //     return view('admin.movies');
        // });
        // Route::get('/genres', function(Request $request) {
        //     $role = $request->attributes->get('role');
        //     if ($role !== 'admin') {
        //         return redirect()->back()->with('error', 'You do not have permission to access this page.');
        //     }
        //     return view('admin.genres');
        // });
        Route::resource('/categories', CategoryController::class);
        Route::resource('/contents', ContentController::class);
        Route::resource('/genres', GenreController::class);
        Route::resource('/seasons', SeasonController::class);

    });

    // main user app routes
    Route::get("/", function(Request $request) {
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
        return view('pages.homepage', ['genres' => $genres, 'role' => $role]);
    });
    
    Route::group(['prefix' => 'movies'], function() {
        Route::get("/", [MoviesController::class, "index"]);
        Route::get("/{id}", [MoviesController::class, "show"]);
    });

    Route::get("/movie", function(Request $request) {
        $role = $request->attributes->get('role');
        return view('pages.movie', ['role' => $role]);
    });
    
    Route::get("/populars", function(Request $request) {
        $role = $request->attributes->get('role');
        return view('pages.populars', ['role' => $role]);
    });
    Route::get("/tvshows", function (Request $request) {
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
        return view('pages.tvShows', ['genres' => $genres, 'movies' => $movies, 'role' => $role]);
    });
    
    Route::get("/register", [AuthController::class, "registerIndex"]);
    Route::get("/login", [AuthController::class, "loginIndex"]);
    Route::post("/register", [AuthController::class, "register"])->name('register');
    Route::post("/login", [AuthController::class, "login"])->name('login');
    Route::post("/logout", [AuthController::class, "logout"])->name('logout');
});