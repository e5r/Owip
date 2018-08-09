<?php

namespace \Owip\Server;

use \Owip\IAppStartup;
use \Owip\IServer;

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

    public function start(IAppStartup $app)
    {
        // TODO: Implement start() method.
        $this->log("start");
        /* Request Data
         * ----------------------
         * owin.RequestBody
         * owin.RequestHeaders
         * owin.RequestMethod
         * owin.RequestPath
         * owin.RequestPathBase
         * owin.RequestProtocol
         * owin.RequestQueryString
         * owin.RequestScheme
         */

        /* Response Data
         * ----------------------
         * owin.ResponseBody
         * owin.ResponseHeaders
         * owin.ResponseStatusCode
         * owin.ResponseReasonPhrase
         * owin.ResponseProtocol
         */
    }
}