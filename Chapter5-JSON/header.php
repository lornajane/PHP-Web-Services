<?php

//header("Content-Type: application/json");
echo json_encode(array("message" => "hello you")) . "\n";
$obj = new stdClass();
$obj->message = "hello you";
echo json_encode($obj) . "\n";

