<?php namespace MyApp\Helpers;

class ZeroHelper {
    private $prefix;

    public function __construct($world) {
        $this->prefix = "Hello " . $world;
    }

    public function getMessage() {
        return $this->prefix;
    }

    public function print() {
        echo $this->getMessage();
    }
}