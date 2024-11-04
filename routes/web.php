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
use App\Http\Controllers\VipPackageController;
use App\Http\Controllers\PaymentController;

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
        Route::resource('/categories', CategoryController::class);
        Route::resource('/contents', ContentController::class);
        Route::resource('/genres', GenreController::class);
        Route::resource('/seasons', SeasonController::class);
        Route::get('/payments', [PaymentController::class, 'showAdminPayments'])->name('admin.payments');
        Route::post('/payments/{payment}/approve', [PaymentController::class, 'approvePayment'])->name('admin.payments.approve');
        Route::post('/payments/{payment}/reject', [PaymentController::class, 'rejectPayment'])->name('admin.payments.reject');
        Route::get('/users', [PaymentController::class, 'showAdminUsers'])->name('admin.users');
        Route::post('/users/check', [PaymentController::class, 'checkSubscription'])->name('admin.users.check');

    });

    Route::resource('/vip', VipPackageController::class);
    Route::get('/payments/{packageId}', [PaymentController::class, 'showPaymentPage'])->name('payments.show');
    Route::post('/payments/{packageId}', [PaymentController::class, 'processPayment'])->name('payments.process');
    Route::get('/payments', [PaymentController::class, 'showUserPayments'])->name('payments.index');
    Route::delete('/payments/delete/{paymentId}', [PaymentController::class, 'deletePayment'])->name('payments.delete');

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
    Route::group(['prefix' => 'tvshows'], function() {
        Route::get("/", [MoviesController::class, "indexTV"]);
        Route::get("/{id}", [MoviesController::class, "showTV"]);
    });
    
    Route::get("/register", [AuthController::class, "registerIndex"]);
    Route::get("/login", [AuthController::class, "loginIndex"]);
    Route::post("/register", [AuthController::class, "register"])->name('register');
    Route::post("/login", [AuthController::class, "login"])->name('login');
    Route::post("/logout", [AuthController::class, "logout"])->name('logout');
});