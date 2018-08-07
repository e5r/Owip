<?php
$autoload = require __DIR__ . '/vendor/autoload.php';
// Only in develop mode
$autoload->addPsr4('Owip\\', __DIR__ . "/src/Owip");

Owip\Setup::Autoload($autoload, __DIR__ . DIRECTORY_SEPARATOR . "src");

$helper = new MyApp\Helpers\ZeroHelper("my wold");

echo $helper->getMessage() . "<hr />";
$helper->print();
