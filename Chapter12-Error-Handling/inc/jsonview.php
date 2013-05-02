<?php

class JsonView
{
    public $status;

    public function render($data) {
        if($this->status) {
            // PHP 5.4+ only
            // http_response_code($this->status);

            // PHP < 5.4
            header("Status: " . $this->status, false, $this->status);
        }

        header('Content-Type: application/json; charset=utf8');
        echo json_encode($data);
        return true;
    }
}
