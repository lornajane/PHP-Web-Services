<?php

$url = "http://requestb.in/example";
$data = array("name" => "Lorna", "email" => "lorna@example.com");

$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => array('Accept: application/javascript',
            'Content-Type: application/x-www-form-urlencoded'),
        'content' => http_build_query($data)
    )
));

$result = file_get_contents($url, false, $context);
echo $result;

