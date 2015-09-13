<?php

require("api-key.php");
$animal = "kitten";
$data = file_get_contents('https://api.flickr.com/services/rest/?' 
    . http_build_query(array(
        "method" => "flickr.photos.search",
        "api_key" => $api_key,
        "tags" => $animal,
        "format" => "xmlrpc",
        "per_page" => 6
    ))
);

echo $data;

$simplexml = new SimpleXMLElement($data);
$data_array = $simplexml->params->param->value->children();

$photos = new SimpleXMLElement($data_array->string);

foreach($photos->photo as $photo) {
    echo $photo['title'] . "\n";
    echo '<img src="http://farm' . $photo['farm'] . '.staticflickr.com/'
        . $photo['server'] . '/' .$photo['id'] . '_' . $photo['secret'] 
        . '.jpg" /><br />' . "\n";
}
