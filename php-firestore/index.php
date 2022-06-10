<?php

require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$firestore = new FirestoreClient();

$data = $firestore->collection('clients')
    ->document('neptunes')
    ->snapshot()
    ->data();

header('Content-Type: application/json');
echo json_encode($data);
