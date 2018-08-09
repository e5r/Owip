<?php namespace MyVendor\MyApp;

use Owip\IAppBuilder;
use Owip\IAppStartup;
use Owip\PropertiesDictionary;

class Startup implements IAppStartup
{
    public function configure(IAppBuilder $app, PropertiesDictionary $env)
    {
    }

    public function handle(PropertiesDictionary $env)
    {
    }
}