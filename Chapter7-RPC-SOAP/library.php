<?php

class Library
{
    public function getDwarves() {
        $dwarves = array("Bashful", "Doc", "Dopey", "Grumpy", "Happy",
            "Sneezy", "Sleepy");
        return $dwarves;
    }

    public function greetUser($name) {
        return array("message" => "Hello, " . $name);
    }
}
