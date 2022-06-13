<?php

use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/movies', function (FirestoreClient $db) {
    $moviesCollection = $db->collection('movies')
        ->documents()
        ->rows();

    // movies array
    $movies = [];

    foreach ($moviesCollection as $movieSnapshot) {
        // get the movie data and store in the array
        $movies[] = $movieSnapshot->data();
    }

    return $movies;
});

