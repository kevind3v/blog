<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(url());

$router->namespace('Src\App');

/** Web */
$router->get("/", "Web:home", "web.home");
$router->get("/sobre", "Web:about", "web.about");

/** Error */
$router->group('oops');
$router->get("/{code}", "Web:error", "web.error");


$router->dispatch();


if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
