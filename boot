#!/usr/bin/env php
<?php
const SETUP_HASH = '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061';
const SETUP_SOURCE = 'https://getcomposer.org/installer';
const SETUP_FILE = __DIR__ . DIRECTORY_SEPARATOR . 'composer-setup.php';
const COMPOSER_FILE = __DIR__ . DIRECTORY_SEPARATOR . 'composer.phar';

$phpVersion = explode('.', phpversion());

if(count($phpVersion) != 3 || $phpVersion[0] < 7) {
    throw new Error('PHP 7 is required!');
}

if(file_exists(COMPOSER_FILE)) {
    echo 'Composer already installed!' . PHP_EOL;
    
    $setupOutput = array();
    exec ('php "' . COMPOSER_FILE . '" --version', $setupOutput);
    
    foreach($setupOutput as $output) {
        echo $output . PHP_EOL;
    }

    return;
}

if(!file_exists(SETUP_FILE)) {
    echo 'Downloading ' . SETUP_SOURCE . '...' . PHP_EOL;
    copy(SETUP_SOURCE, SETUP_FILE);
}

echo 'Computing HASH for ' . SETUP_FILE . '...' . PHP_EOL;
$hash = hash_file('SHA384', SETUP_FILE);

if ($hash !== SETUP_HASH) {
    try {
        unlink('composer-setup.php');
    } finally {
        throw new Error('Installer corrupt!');
    }
}

echo 'Installer verified!' . PHP_EOL;
echo 'Installing...' . PHP_EOL;

$setupOutput = array();
$setupReturn = 0;
exec('php "' . SETUP_FILE . '"', $setupOutput, $setupReturn);

foreach($setupOutput as $output) {
    echo $output . PHP_EOL;
}

if($setupReturn != 0) {
    throw new Error('Failed to run Composer Intaller!');
}

echo 'Removing ' . SETUP_FILE . '...' . PHP_EOL;
unlink(SETUP_FILE);
