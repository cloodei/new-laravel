<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AssignGuestRole;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\VipPackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\FavoriteController;

Route::middleware([AssignGuestRole::class])->group(function() {
    // admin routes
    Route::prefix('admin')->group(function() {
        Route::get('/', function(Request $request) {
            if($request->attributes->get('role') !== 'admin') {
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
        Route::get('/vippackages', [VipPackageController::class, 'show'])->name('vippackages.show');
        Route::get('/vippackages/create', [VipPackageController::class, 'create']);
        Route::post('/vippackages', [VipPackageController::class, 'store'])->name('vippackages.store');
        Route::get('/vippackages/{id}/edit', [VipPackageController::class, 'edit'])->name('vippackages.edit');
        Route::put('/vippackages/{id}/update', [VipPackageController::class, 'update'])->name('vippackages.update');
    });

    Route::get('/vip', [VipPackageController::class, 'index']);
    Route::post('/payments/{packageId}', [PaymentController::class, 'processPayment'])->name('payments.process');
    Route::get('/payments', [PaymentController::class, 'showUserPayments'])->name('payments.index');
    Route::delete('/payments/delete/{paymentId}', [PaymentController::class, 'deletePayment'])->name('payments.delete');

    // main user app routes
    Route::get("/", [MoviesController::class, "homePage"]);
    
    Route::group(['prefix' => 'movies'], function() {
        Route::get("/", [MoviesController::class, "index"]);
        Route::get("/{id}", [MoviesController::class, "show"]);
    });

    Route::get("/watch/{id}", [MoviesController::class, "watchIndex"]);

    Route::group(['prefix' => 'tvshows'], function() {
        Route::get("/", [MoviesController::class, "indexTV"]);
        Route::get("/{id}", [MoviesController::class, "showTV"]);
    });
    Route::group(['prefix' => 'profile'], function() {
        Route::get("/", [ProfileController::class, "index"])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    });
    Route::group(['prefix' => 'watchlist'], function() {
        Route::get("/", [WatchlistController::class, "index"])->name('watchlist.index');
        Route::post("/", [WatchlistController::class, "store"])->name('watchlist.store');
        Route::delete("/{id}", [WatchlistController::class, "destroy"])->name('watchlist.destroy');
    });
    Route::group(['prefix' => 'favorites'], function() {
        Route::get('/', [FavoriteController::class, 'index'])->name('favorites.index');
        Route::get('/add/{id}', [FavoriteController::class, 'add'])->name('favorite.add');
        Route::get('/remove/{id}', [FavoriteController::class, 'remove'])->name('favorite.remove');
    });

    Route::get("/register", [AuthController::class, "registerIndex"]);
    Route::get("/login", [AuthController::class, "loginIndex"]);
    Route::post("/register", [AuthController::class, "register"])->name('register');
    Route::post("/login", [AuthController::class, "login"])->name('login');
    Route::post("/logout", [AuthController::class, "logout"])->name('logout');
    Route::get('/search', [MoviesController::class, 'getSearch'])->name('search');

});