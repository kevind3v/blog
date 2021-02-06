<?php

namespace Src\App;

use BrBunny\BrPlates\BrPlates;
use CoffeeCode\Paginator\Paginator;
use Src\Helpers\Message;
use Src\Models\Category;
use Src\Models\Post;

class Web
{
    /** @var BrPlates */
    private $view;
    /** @var Message */
    private $message;

    /** Web Constructor */
    public function __construct($router)
    {
        $this->view = new BrPlates(BRPLATES);
        $this->view->data(["router" => $router]);
        $this->view->addTemplate("widget", BRPLATES . "/includes");
        $this->message = new Message();
    }

    /**
     * Display home page
     *
     * @param array|null $data
     */
    public function home(?array $data): void
    {
        $blog = (new Post())->find();

        $pager = new  Paginator(url("/p/"));
        $pager->pager($blog->count(), 9, ($data['page'] ?? 1));

        $this->view->show("blog", [
            "blog" => $blog
                ->order("id DESC")
                ->limit($pager->limit())
                ->offset($pager->offset())
                ->fetch(true),
            "paginator" => $pager->render(),
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

    /** Display categories page */
    public function category(): void
    {
        $this->view->show("category", [
            "title" => "Nova categoria",
            "categories" => (new Category())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /**
     * Register Category
     *
     * @param array $data
     */
    public function registerCategory(array $data): void
    {
        if (empty($data['category'])) {
            $json['error'] = true;
            $json['message'] = $this->message->warning(
                "Informe o campo abaixo!!"
            )->render();
            echo json_encode($json);
            return;
        }
        $dataCategory = filter_var($data['category'], FILTER_SANITIZE_STRIPPED);
        $category = new Category();
        if ($category->check($dataCategory)) {
            $json['error'] = true;
            $json['message'] = $this->message->warning(
                "Categoria já cadastrada"
            )->render();
            echo json_encode($json);
            return;
        }
        $category->title = $dataCategory;
        $category->uri = str_slug($dataCategory);
        if ($category->save()) {
            $json['error'] = false;
            $json['message'] = "Cadastrado com sucesso";
        } else {
            $json['error'] = true;
            $json['message'] = $this->message->error(
                "Não foi possível cadastrar {$dataCategory}"
            )->render();
        }
        echo json_encode($json);
        return;
    }

    /** Display form page*/
    public function form(): void
    {
        if (!(new Category())->find()->count()) {
            $this->message->error("Você precisa cadastrar categoria primeiro")->flash();
            redirect(url("nova-categoria"));
        }
        $this->view->show("form", [
            "title" => "Novo artigo",
            "categories" => (new Category())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /**
     * Register post
     *
     * @param array $data
     */
    public function registerPost(array $data): void
    {
        if (in_array("", $data) || $data['category'] == "#") {
            $json['error'] = true;
            $json['message'] = $this->message->warning(
                "Informe o campo abaixo!!"
            )->render();
            echo json_encode($json);
            return;
        }
        if ($image = image($data['image'])) {
            $post = new Post();
            $post->category = $data['category'];
            $post->title = $data['title'];
            $post->uri = str_slug($data['title']);
            $post->subtitle = $data['subtitle'];
            $post->content = $data['content'];
            $post->cover = $image;

            if ($post->save()) {
                $this->message->success("Produto atualizado com sucesso")->flash();
                $json['redirect'] = url();
                echo json_encode($json);
                return;
            } else {
                removeImage($image);
            }
        }
        $json['error'] = true;
        $json['message'] = $this->message->warning(
            "Tivemos um problema!!"
        )->render();
        echo json_encode($json);
        return;
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
        $post = (new Post())
            ->find("MATCH(title, subtitle) AGAINST(:s)", "s={$search}");

        if (!$post->count()) {
            $this->view->show("blog", [
                "search" => $search,
                "categories" =>  $categories
            ]);
            return;
        }

        $pager = new  Paginator(url("/buscar/{$search}/"));
        $pager->pager($post->count(), 9, $page);

        $this->view->show("blog", [
            "search" => $search,
            "blog" => $post
                ->order("id DESC")
                ->limit($pager->limit())
                ->offset($pager->offset())
                ->fetch(true),
            "paginator" => $pager->render(),
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
        $postCategory = (new Post())->find("category = :c", "c={$category->id}");
        $pager = new Paginator(url("c/{$category->uri}"));
        $pager->pager($postCategory->count(), 9, $page);

        $this->view->show(
            "blog",
            [
                "title" => "Artigos em {$category->title}",
                "blog" => $postCategory
                    ->order("id DESC")
                    ->limit($pager->limit())
                    ->offset($pager->offset())
                    ->fetch(true),
                "paginator" => $pager->render(),
                "categories" => (new Category())->order("title ASC")->find()->fetch(true)
            ]
        );
    }

    /**
     * Display post details
     *
     * @param array $data
     * @return void
     */
    public function blogPost(array $data): void
    {
        $uri = filter_var($data['uri'], FILTER_SANITIZE_STRIPPED);
        $post = (new Post())->findByUri($uri);
        if (!$post) {
            redirect("/404");
        }
        $post->views += 1;
        $post->save();
        $this->view->show("post", [
            "post" => $post
        ]);
    }

    /**
     * Display form edit post
     *
     * @param array $data
     * @return void
     */
    public function formPost(array $data): void
    {
        $uri = filter_var($data['uri'], FILTER_SANITIZE_STRIPPED);
        $post = (new Post())->findByUri($uri);
        if (!$post) {
            redirect("/404");
        }
        $this->view->show("edit", [
            "title" => "Editar artigo",
            "post" => $post,
            "categories" => (new Category())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /**
     * Edit post
     *
     * @param array $data
     * @return void
     */
    public function editPost(array $data): void
    {
        if (in_array("", $data)) {
            $json['error'] = true;
            $json['message'] = $this->message->warning(
                "Informe o campo abaixo!!"
            )->render();
            echo json_encode($json);
            return;
        }
        $uri = filter_var($data['uri'], FILTER_SANITIZE_STRIPPED);
        $post = (new Post())->findByUri($uri);
        if (!$post) {
            redirect("/404");
        }
        $post->category = $data['category'];
        $post->title = $data['title'];
        $post->uri = str_slug($data['title']);
        $post->subtitle = $data['subtitle'];
        $post->content = $data['content'];
        if (!empty($data['image']) && $data['image'] != $post->cover) {
            if ($image = image($data['image'])) {
                $post->cover = $image;
            }
        }

        if ($post->save()) {
            $this->message->success("Produto atualizado com sucesso")->flash();
            $json['redirect'] = url("artigo/{$post->uri}");
            echo json_encode($json);
            return;
        }

        $json['error'] = true;
        $json['message'] = $this->message->warning(
            "Tivemos um problema!!"
        )->render();
        echo json_encode($json);
        return;
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
