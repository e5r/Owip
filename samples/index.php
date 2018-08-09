<?php $autoload = require __DIR__ . '/../vendor/autoload.php';

Owip\Setup::load($autoload, join(DIRECTORY_SEPARATOR, array(__DIR__, "src")));

use Owip\Host\WebHostBuilder;
use Owip\Server\PhpEmbeddedServer;
use MyVendor\MyApp\Startup;

echo "<form action='" . $_SERVER['REQUEST_URI'] . "' method='POST'><input type='hidden' name='Servidor' value='" . $_SERVER['SERVER_SOFTWARE'] . "' /><input type='submit' value='Submit POST' /></form><hr>";
echo "<form enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "' method='POST'>File: <input type='file' name='Arquivo' /><br><input type='hidden' name='Servidor' value='" . $_SERVER['SERVER_SOFTWARE'] . "' /><input type='submit' value='Submit FILE' /></form><hr>";
echo file_get_contents('php://input');
echo "<hr />";

$builder = new WebHostBuilder();

$builder->useServer(PhpEmbeddedServer::class);
$builder->useContentRoot(__DIR__);
$builder->useStartup(Startup::class);

$host = $builder->build();

$host->run();
