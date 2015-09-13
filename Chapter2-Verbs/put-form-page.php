<?php

if($_SERVER['REQUEST_METHOD'] == "PUT") {
    $data = [];
    $incoming = file_get_contents("php://input");
    parse_str($incoming, $data);
    echo "New user email: " . filter_var($data["email"], FILTER_VALIDATE_EMAIL);
} else {
    echo "um?";
}
