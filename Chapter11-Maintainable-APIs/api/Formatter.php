<?php

class Formatter
{
    protected $request;

    public function __construct($request) {
        $this->request = $request;
    }

    public function render($response, $data = [])
    {
        if ($data) { 
            $format = $this->getFormatFromAcceptHeader();

            switch ($format) {
                case 'html':
                    $body = $response->getBody();
                    // very ugly output but you get the idea
                    $body = $response->getBody();
                    $body->write(var_export($data, true));

                case 'json':
                default:
                    $body = $response->getBody();
                    $body->write(json_encode($data));
                    $response = $response
                        ->withHeader("Content-Type", "application/json");
            }
        }
        return $response;
    }

    protected function getFormatFromAcceptHeader() {
        $accept = explode(
            ',', 
            $this->request->getHeaderLine("Accept")
        );

        // we prefer JSON
        $format = 'json';

        // we also support HTML 
        if (in_array("text/html", $accept) 
            || in_array("text/xhtml", $accept)) {
            $format = 'html';
        }

        return $format;
    }
}

