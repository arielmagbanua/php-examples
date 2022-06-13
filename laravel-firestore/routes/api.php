<?php

use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add-movie', function (\Illuminate\Http\Request $request, FirestoreClient $db) {
    // get the new movie payload
    $moviePayload = json_decode($request->getContent(), true);

    // get the movie collection
    $moviesCollection = $db->collection('movies');

    // add the movie
    $result = $moviesCollection->add($moviePayload);

    // return the result data
    return $result->snapshot()
        ->data();
});
