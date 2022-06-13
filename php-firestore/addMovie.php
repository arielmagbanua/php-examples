<?php

require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

// create the firestore client
$db = new FirestoreClient();

// get the movie collection
$moviesCollection = $db->collection('movies');

// new movie
$newMovie = [
    'budget' => 55000000,
    'box_office' => 678200000,
    'ratings' => [
        [
            'review_agency' => 'Rotten Tomatoes',
            'rating' => '7.50/10'
        ],
        [
            'review_agency' => 'CinemaScore',
            'rating' => 'A+'
        ]
    ],
    'director' => 'Robert Zemeckis',
    'title' => 'Forrest Gump',
];

// add the movie
$result = $moviesCollection->add($newMovie);

// set the header
header('Content-Type: application/json');

// encode the movie data as JSON string and print as a response
echo json_encode($result->snapshot()->data());
