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

Route::get('/', function (FirestoreClient $firestoreClient) {
    return $firestoreClient->collection('clients')
        ->document('neptunes')
        ->snapshot()
        ->data();
});
