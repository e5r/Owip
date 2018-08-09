<?php

namespace Owip\Server;

use Owip\IAppFunc;
use \Owip\IAppStartup;
use \Owip\IServer;
use Owip\PropertiesDictionary;

class PhpEmbeddedServer implements IServer
{
    private function log($message)
    {
        echo "<pre style='color:darkcyan'>LOG PhpEmbeddedServer: $message</pre>";
    }

    public function initializeProperties($properties)
    {
        // TODO: Implement initializeProperties() method.
        $this->log("initializeProperties");
    }

    public function start(IAppFunc $app, PropertiesDictionary $env)
    {
        // TODO: Implement start() method.
        $this->log("start");
        $app->handler($env);
    }
}