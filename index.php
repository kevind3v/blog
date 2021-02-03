<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(url());

$router->namespace('Src\App');

/** Web */
$router->get("/", "Web:home", "web.home");
$router->get("/p/{page}", "Web:home", "web.home");
$router->get("/artigo/{uri}", "Web:showPost", "web.showPost");

$router->get("/sobre", "Web:about", "web.about");
$router->get("/novo-artigo", "Web:showForm", "web.showForm");
$router->post("/novo-artigo", "Web:register", "web.register");
$router->get("/nova-categoria", "Web:showCategory", "web.showCategory");
$router->post("/nova-categoria", "Web:registerCategory", "web.registerCategory");

/** Error */
$router->group('oops');
$router->get("/{code}", "Web:error", "web.error");


$router->dispatch();


if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
