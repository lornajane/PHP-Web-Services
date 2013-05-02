<?php

$url = "http://requestb.in/example";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_COOKIE, "visited=true");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);


