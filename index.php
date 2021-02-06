<?php

use CoffeeCode\Router\Router;

require __DIR__ . "/vendor/autoload.php";

$router = new Router(url());

$router->namespace('Src\App');

/** Web */
$router->get("/", "Web:home", "web.home");
$router->get("/p/{page}", "Web:home", "web.home");
$router->get("/sobre", "Web:about", "web.about");
/** Search */
$router->post("/buscar", "Web:search", "web.search");
$router->get("/buscar/{params}/{page}", "Web:search", "web.getSearch");
$router->get("/c/{category}", "Web:searchCategory", "web.by.category");
$router->get("/c/{category}/{page}", "Web:searchCategory", "web.page.by.Category");

/** Post */
$router->get("/novo-artigo", "Post:form", "post.form");
$router->post("/novo-artigo", "Post:register", "post.register.post");
$router->get("/artigo/{uri}", "Post:post", "post.show");
$router->get("/artigo/{uri}/editar", "Post:formEdit", "post.form.edit");
$router->post("/artigo/{uri}/editar", "Post:edit", "post.edit");
$router->post("/artigo/delete", "Post:delete", "post.delete");

/** Category */
$router->get("/nova-categoria", "Category:form", "category.form");
$router->post("/nova-categoria", "Category:register", "web.register");


/** Error */
$router->group('oops');
$router->get("/{code}", "Web:error", "web.error");


$router->dispatch();


if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}
