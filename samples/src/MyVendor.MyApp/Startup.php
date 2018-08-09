<?php
namespace MyVendor\MyApp;

use Owip\IAppBuilder;
use Owip\IAppStartup;
use Owip\PropertiesDictionary;

class Startup implements IAppStartup
{
    private function log($message)
    {
        echo "<pre style='color:darkred'>LOG Startup: $message</pre>";
    }

    public function configure(IAppBuilder $app, PropertiesDictionary $env)
    {
        $this->log("configure");
    }

    public function handler(PropertiesDictionary $env)
    {
        $this->log("handler");
    }
}