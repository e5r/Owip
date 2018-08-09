<?php $autoload = require __DIR__ . '/../vendor/autoload.php';

Owip\Setup::load($autoload, join(DIRECTORY_SEPARATOR, array(__DIR__, "src")));

use Owip\Host\WebHostBuilder;
use Owip\Server\PhpEmbeddedServer;
use MyVendor\MyApp\Startup;

$builder = new WebHostBuilder();

$builder->useServer(PhpEmbeddedServer::class);
$builder->useContentRoot(__DIR__);
$builder->useStartup(Startup::class);

$host = $builder->build();

$host->run();
