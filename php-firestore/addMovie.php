<?php

require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$firestore = new FirestoreClient();

// movies collection
$moviesCollection = $firestore->collection('movies');

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

header('Content-Type: application/json');
echo json_encode($result->snapshot()->data());
