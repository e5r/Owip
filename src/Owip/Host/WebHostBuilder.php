<?php

namespace Owip\Host;

use Owip;
use Owip\IAppBuilder;
use Owip\IHostBuilder;

class WebHostBuilder implements IHostBuilder, IAppBuilder
{
    private $serverClass;
    private $contentRootPath;
    private $startupClass;

    private function log($message)
    {
        echo "<pre style='color:blue'>LOG WebHostBuilder: $message</pre>";
    }

    private function checkAllRequirements()
    {
        $this->log("checkAllRequirements");

        if (!isset($this->serverClass)) {
            throw new \Exception("Uninformed server implementation");
        }

        if (!isset($this->contentRootPath)) {
            throw new \Exception("Uninformed content root path");
        }

        if (!isset($this->startupClass)) {
            throw new \Exception("Uninformed application startup");
        }
    }

    public function useServer($serverClass)
    {
        $this->log("useServer: serverClass -> $serverClass");

        if (isset($this->serverClass)) {
            throw new \Exception("Server implementation already informed");
        }

        $this->serverClass = $serverClass;
    }

    public function useContentRoot($contentRootPath)
    {
        $this->log("useContentRoot: contentRootPath -> $contentRootPath");

        if (isset($this->contentRootPath)) {
            throw new \Exception("Content root path already informed");
        }

        $this->contentRootPath = $contentRootPath;
    }

    public function useStartup($startupClass)
    {
        $this->log("useStartup: startupClass -> $startupClass");

        if (isset($this->startupClass)) {
            throw new \Exception("Application startup already informed");
        }

        $this->startupClass = $startupClass;
    }

    public function build()
    {
        $this->log("build");
        $this->checkAllRequirements();

        return new WebHostAppBuilder($this->serverClass, $this->startupClass);
    }
}