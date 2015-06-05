<?php

$hook_endpoints = ["http://29baf15.ngrok.io/handle_webhooks.php",
    "http://localhost:8080/handle_webhooks.php"];

if($_POST) {
    // very lazily chuck the whole thing at json_encode
    // a Real Application would validate or look things up
    $post_body = json_encode($_POST);

    // send using streams
    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/json',
            'content' => $post_body,
        ]
    ]);

    foreach ($hook_endpoints as $endpoint) {
        $success = file_get_contents($endpoint, false, $context);

        echo "<p>Send to:" . $endpoint . "</p>\n";
    }

    include ("hook_thanks.html");
} else {
    // display the template
    include("hook_form.html");
}

