<?php

require "accept.php";

$data = ["greeting" => "hello", "name" => "Lorna"];

$accepted_formats = parseAcceptHeader();
// print_r($accepted_formats);
$supported_formats = ["application/json", "text/html"];
foreach($accepted_formats as $format) {
    if(in_array($format, $supported_formats)) {
        // yay, use this format
        break;
    }
}

switch($format) {
    case "application/json":
        header("Content-Type: application/json");
        $output = json_encode($data);
        break;
    case "text/html":
    default:
        $output = "<p>" . implode(', ', $data) . "</p>";
        break;
}

echo $output;

