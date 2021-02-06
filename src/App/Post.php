<?php

namespace Src\App;

use Src\Core\Controller;
use Src\Models\Category;
use Src\Models\Post as article;

class Post extends Controller
{
    /** Post Constructor */
    public function __construct($router)
    {
        parent::__construct($router);
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
    public function register(array $data): void
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
            $post = new article();
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

    /**
     * Display post details
     *
     * @param array $data
     * @return void
     */
    public function post(array $data): void
    {
        $uri = filter_var($data['uri'], FILTER_SANITIZE_STRIPPED);
        $post = (new article())->findByUri($uri);
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
    public function formEdit(array $data): void
    {
        $uri = filter_var($data['uri'], FILTER_SANITIZE_STRIPPED);
        $post = (new article())->findByUri($uri);
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
    public function edit(array $data): void
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
        $post = (new article())->findByUri($uri);
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
                removeImage($post->cover);
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
}
