<?php

require "../vendor/autoload.php";
require "Formatter.php";

$app = new \Slim\App();

// create the logger, add to DI container
$container = $app->getContainer();
unset($container['errorHandler']);
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['formatter'] = function ($c) {
    return new Formatter($c->get('request'));
};

set_exception_handler(function ($exception) {
    if($exception->getCode()) {
        http_response_code($exception->getCode());
    } else {
        http_response_code(400);
    }

    header("Content-Type: application/json");
    echo json_encode(["message" => $exception->getMessage()]);
});

$app->get(
    '/',
    function ($request, $response) {
        $data = ["home" => "/", "list" => "/list"];
        $response = $this->formatter->render($response, $data);
        return $response;
    }
);

$app->get(
    "/list",
    function ($request, $response) {
        // fetch items
        $items = [];
        $fp = fopen('../items.csv', 'r');
        while(false !== ($data = fgetcsv($fp))) {
            $items[] = current($data);
        }

        $data = ["items" => $items, "count" => count($items)];
        $response = $this->formatter->render($response, $data);
        return $response;
    }
);

$app->post(
    "/list",
    function($request, $response) {
        $data = $request->getParsedBody();

        if(isset($data) && isset($data['item']) && !empty($data['item'])) {
            $this->logger->addInfo("Adding data item: " . $data['item']);
            // save item
            $fp = fopen('../items.csv', 'a');
            fputcsv($fp, [$data['item']]);

            $response = $response
                ->withStatus(201)
                ->withHeader("Location", "/list");

            $response = $this->formatter->render($response);
            return $response;
        }

        // if we got this far, something went really wrong
        throw new UnexpectedValueException("Item could not be parsed");
    }
);


$app->run();
