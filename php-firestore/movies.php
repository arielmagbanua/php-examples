<?php

require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$firestore = new FirestoreClient();

$moviesCollection = $firestore->collection('movies')->documents()->rows();

$movies = [];

foreach ($moviesCollection as $movieSnapshot) {
    $movies[] = $movieSnapshot->data();
}

header('Content-Type: application/json');
echo json_encode($movies);
