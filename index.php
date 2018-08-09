<?php $autoload = require __DIR__ . '/vendor/autoload.php';

Owip\Setup::load($autoload, join(DIRECTORY_SEPARATOR, array(__DIR__, "src")));

use Owip\Host\WebHostBuilder;
use Owip\IAppBuilder;
use Owip\IAppStartup;
use Owip\PropertiesDictionary;
use Owip\Server\PhpEmbeddedServer;

class Startup implements IAppStartup
{
    public function configure(IAppBuilder $app, PropertiesDictionary $env)
    {
    }

    public function handle(PropertiesDictionary $env)
    {
    }
}

$builder = new WebHostBuilder();

$builder->useServer(PhpEmbeddedServer::class);
$builder->useContentRoot(__DIR__);
$builder->useStartup(Startup::class);

$host = $builder->build();

$host->run();
