<?php

// The data to send to the API
$postData = array(
    'query' => 'apple',
);

// Setup cURL
$ch = curl_init('https://trackapi.nutritionix.com/v2/natural/nutrients');
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
    'Content-Type:application/json',
    'x-app-Id: 3f0a4b18',
    'x-app-Key:7795b68adeba3faf9a870e02a444cb59'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

// Send the request
$response = curl_exec($ch);

// Check for errors
if($response === FALSE){
    die(curl_error($ch));
}

// Decode the response
$responseData = json_decode($response, TRUE);

// Print the date from the response
var_dump($responseData);
 /*
 



/////

$curl_h = curl_init('https://trackapi.nutritionix.com/v2/search/instant?query=egg+Salad');

curl_setopt($curl_h, CURLOPT_HTTPHEADER,
    array(
     'x-app-Id: 3f0a4b18',
    'x-app-Key:7795b68adeba3faf9a870e02a444cb59'
    )
);

# do not output, but store to variable
curl_setopt($curl_h, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl_h);

$responseData = json_decode($response, TRUE);

// Print the date from the response
var_dump($responseData);
  
 */