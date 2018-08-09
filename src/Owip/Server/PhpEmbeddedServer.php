<?php

namespace Owip\Server;

use Owip\IAppFunc;
use Owip\IServer;
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

        /* Common keys
         * ----------------------
         * server.RemoteIpAddress
         * server.RemotePort
         * server.LocalIpAddress
         * server.LocalPort
         * server.IsLocal
         * server.Capabilities
         * server.OnSendingHeaders
         * server.OnInit
         * server.OnDispose
         */

    }

    public function start(IAppFunc $app, PropertiesDictionary $env)
    {
        // TODO: Implement start() method.
        $this->log("start");
        $app->handler($env);
    }
}