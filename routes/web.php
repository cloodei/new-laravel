<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/', function() {
    $genres = [
        [
            "name" => "Action",
            "movies" => ["Action Movie 1", "Action Movie 2", "Action Movie 3", "Action Movie 4"]
        ],
        [
            "name" => "Comedy",
            "movies" => ["Comedy Movie 1", "Comedy Movie 2", "Comedy Movie 3", "Comedy Movie 4"]
        ],
        [
            "name" => "Drama",
            "movies" => ["Drama Movie 1", "Drama Movie 2", "Drama Movie 3", "Drama Movie 4"]
        ],
        [
            "name" => "Sci-Fi",
            "movies" => ["Sci-Fi Movie 1", "Sci-Fi Movie 2", "Sci-Fi Movie 3", "Sci-Fi Movie 4"]
        ]
    ];
    
    return view('layouts.app', ['genres' => $genres]);
});
