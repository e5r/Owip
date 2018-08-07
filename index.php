<?php $autoload = require __DIR__ . '/vendor/autoload.php';
// Only in develop mode
$autoload->addPsr4('Owip\\', join(DIRECTORY_SEPARATOR, array(__DIR__, "src", "Owip")));

Owip\Setup::Autoload($autoload, join(DIRECTORY_SEPARATOR, array(__DIR__, "src")));

$helper = new MyApp\Helpers\ZeroHelper("my wold");

echo $helper->getMessage() . "<hr />";
$helper->print();
