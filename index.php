<?php

declare(strict_types=1);

spl_autoload_register(function (string $classNamespace) {
    $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
    $path = "src/$path.php";
    require_once($path);
});

$configuration = require_once("config/config.php");

use App\Controller\AbstractController;
use App\Controller\ProductController;
use App\Request;

$request = new Request($_GET, $_POST, $_SERVER);

AbstractController::initConfiguration($configuration);
(new ProductController($request))->run();
