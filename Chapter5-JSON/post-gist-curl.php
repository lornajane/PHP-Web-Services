<?php

// grab the access token from an external file
require("github-creds.php");

$data = json_encode(array(
    'description' => 'Gist created by API',
    'public' => 'true',
    'files' => array(
        'text.txt' => array(
            'content' => 'Some riveting text'
        )
    )
));
echo $data;

$url = "https://api.github.com/gists";
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array('Content-Type: application/javascript',
        'Authorization: token ' . $access_token)
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$gist = json_decode($result, true);
if($gist) {
    echo file_get_contents($gist['url']);
}
