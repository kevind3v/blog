<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(url());

$router->namespace('Src\App');

/** Web */
$router->get("/", "Web:home", "web.home");
$router->get("/p/{page}", "Web:home", "web.home");
$router->get("/sobre", "Web:about", "web.about");

/** Display post */
$router->get("/artigo/{uri}", "Web:blogPost", "web.post");

/** Register */
$router->get("/novo-artigo", "Web:form", "web.form");
$router->post("/novo-artigo", "Web:registerPost", "web.register.post");
$router->get("/nova-categoria", "Web:category", "web.category");
$router->post("/nova-categoria", "Web:registerCategory", "web.register.category");

/** Search */
$router->post("/buscar", "Web:search", "web.search");
$router->get("/buscar/{params}/{page}", "Web:search", "web.getSearch");
$router->get("/c/{category}", "Web:searchCategory", "web.by.category");
$router->get("/c/{category}/{page}", "Web:searchCategory", "web.page.by.Category");

/** Error */
$router->group('oops');
$router->get("/{code}", "Web:error", "web.error");


$router->dispatch();


if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
