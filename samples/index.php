<?php $autoload = require __DIR__ . '/vendor/autoload.php';

Owip\Setup::load($autoload, __DIR__ . DIRECTORY_SEPARATOR . "src");

use Owip\Host\WebHostBuilder;
use Owip\Server\BasicServer;
use MyVendor\MyApp\Startup;

$host = new WebHostBuilder()
    ->useServer(BasicServer::class)
    ->useContentRoot(__DIR__)
    ->useStartup(Startup::class)
    ->build();

$host->run();
