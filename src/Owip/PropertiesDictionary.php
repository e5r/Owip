<?php

namespace Owip;

class PropertiesDictionary
{
    const OWIP_VERSION = "1.0.0";

    private $properties;

    public function __construct()
    {
        $this->log("__construct");
        $this->properties = array(
            "owip.Version" => self::OWIP_VERSION
        );
    }

    private function log($message)
    {
        echo "<pre style='color:orangered'>LOG PropertiesDictionary: $message</pre>";
    }

    public function setProperty($propName, $propValue)
    {
        $this->properties[$propName] = $propValue;
    }

    public function removeProperty($propName)
    {
        if (isset($this->properties[$propName])) {
            unset($this->properties[$propName]);
        }
    }

    public function getProperties()
    {
        return $this->properties;
    }
}