<?php $autoload = require __DIR__ . '/vendor/autoload.php';

Owip\Setup::Autoload($autoload, __DIR__ . DIRECTORY_SEPARATOR . "src");

$host = new Owip\Host\WebHostBuilder()
    ->useServer("Owip\Server\Basic")
    ->useContentRoot(__DIR__)
    ->useStartup("MyVendor\MyApp\Startup")
    ->build();
	
$host->run();
