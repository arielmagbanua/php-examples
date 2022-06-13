<?php

require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

// create the firestore client
$db = new FirestoreClient();

// get the movie collection and the documents
$moviesCollection = $db->collection('movies')
    ->documents()
    ->rows();

// movies array
$movies = [];

foreach ($moviesCollection as $movieSnapshot) {
    // get the movie data and store in the array
    $movies[] = $movieSnapshot->data();
}

// set the header
header('Content-Type: application/json');

// encode movies array as string and print as a response
echo json_encode($movies);
