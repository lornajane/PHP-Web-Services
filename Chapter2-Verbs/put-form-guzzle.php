<?php

require "vendor/autoload.php";

$url = "http://localhost/book/put-form-page.php";
$data = ["email" => "lorna@example.com", "display_name" => "LornaJane"];

$client = new \GuzzleHttp\Client();
$result = $client->put($url, [
    "headers" => ["Content-Type" => "application/x-www-form-urlencoded"],
    "body" => http_build_query($data)
]);

echo $result->getBody();

