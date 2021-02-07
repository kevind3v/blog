<?php

namespace Src\App;

use CoffeeCode\Paginator\Paginator;
use Src\Core\Controller;
use Src\Models\Category;
use Src\Models\Post;

class Web extends Controller
{

    /** Web Constructor */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     * Display home page
     *
     * @param array|null $data
     */
    public function home(?array $data): void
    {
        $posts = (new Post())->find();

        $pager = new  Paginator(url("/p/"));
        $pager->pager($posts->count(), 9, ($data['page'] ?? 1));

        $this->view->show("blog", [
            "data" => (object)[
                "posts" => $posts
                    ->order("id DESC")
                    ->limit($pager->limit())
                    ->offset($pager->offset())
                    ->fetch(true),
                "paginator" => $pager->render(),
                "count" => $posts->count()
            ],
            "categories" => (new Category())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /** Display about page */
    public function about(): void
    {
        $this->view->show("about", [
            "title" => "Sobre nós"
        ]);
    }


    /** Search posts */
    public function search(array $data): void
    {
        if (!empty($data['search'])) {
            $search = filter_var($data['search'], FILTER_SANITIZE_STRIPPED);
            echo json_encode(["redirect" => url("/buscar/{$search}/1")]);
            return;
        }
        if (empty($data['params'])) {
            redirect("/blog");
        }

        $search = filter_var($data['params'], FILTER_SANITIZE_STRIPPED);
        $page = (filter_var($data['page'], FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);
        $categories = (new Category())->order("title ASC")->find()->fetch(true);
        $posts = (new Post())
            ->find("MATCH(title, subtitle) AGAINST(:s)", "s={$search}");


        if (!$posts->count()) {
            $this->view->show("blog", [
                "data" => (object)[
                    "count" => 0
                ],
                "search" => $search,
                "categories" =>  $categories
            ]);
            var_dump($posts);
            return;
        }

        $pager = new  Paginator(url("/buscar/{$search}/"));
        $pager->pager($posts->count(), 9, $page);

        $this->view->show("blog", [
            "search" => $search,
            "data" => (object)[
                "posts" => $posts
                    ->order("id DESC")
                    ->limit($pager->limit())
                    ->offset($pager->offset())
                    ->fetch(true),
                "paginator" => $pager->render(),
                "count" => $posts->count()
            ],
            "categories" =>  $categories
        ]);


        return;
    }

    /**
     * Search post by category
     *
     * @param array $data
     * @return void
     */
    public function searchCategory(array $data): void
    {
        $em = filter_var($data['category'], FILTER_SANITIZE_STRIPPED);
        $category = (new Category())->findByUri($em);

        if (!$category) {
            redirect(url());
        }

        $page = filter_var($data['page'] ?? 1, FILTER_VALIDATE_INT);
        $page = (($page) ? $page : 1);
        $posts = (new Post())->find("category = :c", "c={$category->id}");
        $pager = new Paginator(url("c/{$category->uri}"));
        $pager->pager($posts->count(), 9, $page);

        $this->view->show(
            "blog",
            [
                "title" => "Artigos em {$category->title}",
                "category" => $category->title,
                "data" => (object)[
                    "posts" => $posts
                        ->order("id DESC")
                        ->limit($pager->limit())
                        ->offset($pager->offset())
                        ->fetch(true),
                    "paginator" => $pager->render(),
                    "count" => $posts->count()
                ],
                "categories" => (new Category())->order("title ASC")->find()->fetch(true)
            ]
        );
    }


    /**
     * ERROR
     * @param array $data
     * @return void
     */
    public function error(array $data): void
    {
        $dataError = new \stdClass();
        $dataError->code = $data['code'];
        $dataError->title = "Oops!! Conteúdo indisponível";
        $dataError->message = "O conteúdo que você tentou acessar não existe, 
        está indisponível no momento ou foi removido :(";

        $this->view->show("error", [
            "title" => $data['code'],
            "error" => $dataError
        ]);
    }
}
