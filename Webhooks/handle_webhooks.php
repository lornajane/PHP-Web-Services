<?php

$data = json_decode(file_get_contents("php://input"), true);

file_put_contents("example_webhook.txt", print_r($data, true));

echo $data['zen'];
