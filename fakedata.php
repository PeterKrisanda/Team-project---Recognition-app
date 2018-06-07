<?php
//API Url
$url = 'http://localhost:8080/tp/onlogin.php';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
//1 hodnotiaci 2 hodnoteny
$jsonData = array(
    'id1' => 'sk-kosice/stankach',
    'firstname1' => 'Stanislav',
    'lastname1' => 'Kachman',
    'id2' => 'sk-kosice/jakkob',
    'firstname2' => 'Jakub',
    'lastname2' => 'Kobylan'
);
 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
echo $jsonDataEncoded;

?>