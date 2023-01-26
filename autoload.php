<?php

use Doctrine\Common\ClassLoader;
use my\package\Class_Name;
use my\package_name\Class_Name2;

spl_autoload_register('handle_autoload');

function handle_autoload (string $class): void
{
    print_r($class . PHP_EOL);

    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $filePathArr = explode(DIRECTORY_SEPARATOR, $filePath);

    $fileName = &$filePathArr[count($filePathArr) - 1];
    $fileName = str_replace('_', DIRECTORY_SEPARATOR, $fileName);
    $filePath = implode(DIRECTORY_SEPARATOR, $filePathArr);
    $filePath .= '.php';

    if (file_exists($filePath)) {
        require $filePath;
    }

    print_r($filePath . PHP_EOL);
};

$classLoader = new ClassLoader();
$className = new Class_Name();
$className2 = new Class_Name2();
