<?php

require 'vendor/autoload.php';

// use GuzzleHttp\Client;

use HpeliteBookg6js\Composer\MyApp;

// $client = new Client();

// // $response = $client->get('https://jsonplaceholder.typicode.com/posts');
// $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');

// $data = json_decode($response->getBody(), true);

// // print_r($data);

// $price = $data['bitcoin']['usd'];

// echo "Bitcoin price: $price";

$app = new MyApp();
$app->run();