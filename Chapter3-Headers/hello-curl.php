<?php

$url = "http://localhost/book/hello.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, array(
    "Accept: text/html;q=0.5,application/json",
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo $response;
curl_close($ch);

