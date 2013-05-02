<?php

class Library
{
    /**
     * return a list of dwarves
     *
     * @return array The dwarves
     */
    public function getDwarves() {
        $dwarves = array("Bashful", "Doc", "Dopey", "Grumpy", "Happy",
            "Sneezy", "Sleepy");
        return $dwarves;
    }

    /**
     * Greet a person by name
     *
     * @param string $name The name to greet
     * @return string A greeting
     */
    public function greetUser($name) {
        return "Hello, " . $name;
    }
}
