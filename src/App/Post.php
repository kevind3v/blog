<?php

namespace Src\App;

use BrBunny\BrUploader\Base64;
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
            $this->message->error("Você precisa cadastrar categorias primeiro")->flash();
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
            $json['message'] = $this->message->warning(
                "Informe os campos abaixo!!"
            )->render();
            echo json_encode($json);
            return;
        }

        $uri = str_slug(trim($data['title']));
        if ((new article())->findByUri($uri)) {
            $json['message'] = $this->message->warning(
                "Já existe um artigo com o título informado"
            )->render();
            echo json_encode($json);
            return;
        }

        try {
            $post = new article();
            $post->category = $data['category'];
            $post->title = trim($data['title']);
            $post->uri = $uri;
            $post->subtitle = $data['subtitle'];
            $post->content = $data['content'];
            $image = (new Base64("uploads", "images"))->upload($data['image'], $uri);
            $post->cover = $image;
            if ($post->save()) {
                $this->message->success("Produto atualizado com sucesso")->flash();
                $json['redirect'] = url();
                echo json_encode($json);
                return;
            }
        } catch (\Exception $e) {
            $json['message'] = $this->message->warning(
                $e->getMessage()
            )->render();
        }
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
        if (in_array("", $data) && $data['id'] === "#") {
            $json['message'] = $this->message->warning(
                "Informe o campo abaixo!!"
            )->render();
            echo json_encode($json);
            return;
        }

        $idPost = filter_var($data['id'], FILTER_VALIDATE_INT);

        $post = (new article())->findById($idPost);
        if (!$post) {
            redirect("/404");
        }

        $uri = str_slug(trim($data['title']));
        $checkPost = (new article())->findByUri($uri);
        if ($checkPost && $checkPost->id != $idPost) {
            $json['message'] = $this->message->warning(
                "Já existe um artigo com o título informado"
            )->render();
            echo json_encode($json);
            return;
        }

        try {
            $post->category = $data['category'];
            $post->title = $data['title'];
            $post->uri = $uri;
            $post->subtitle = $data['subtitle'];
            $post->content = $data['content'];
            if (!empty($data['image'])) {
                $image = (new Base64("uploads", "images"))->upload($data['image'], $uri);
                Base64::remove($post->cover);
                $post->cover = $image;
            }
            if ($post->save()) {
                $this->message->success("Produto atualizado com sucesso")->flash();
                $json['redirect'] = url();
                echo json_encode($json);
                return;
            }
        } catch (\Exception $e) {
            $json['message'] = $this->message->warning(
                $e->getMessage()
            )->render();
        }

        if ($post->save()) {
            $this->message->success("Produto atualizado com sucesso")->flash();
            $json['redirect'] = url("artigo/{$post->uri}");
            echo json_encode($json);
            return;
        }

        $json['message'] = $this->message->warning(
            "Tivemos um problema!!"
        )->render();
        echo json_encode($json);
        return;
    }

    /**
     * Delete post
     *
     * @param array $data
     */
    public function delete(array $data): void
    {
        $id = filter_var($data['id'], FILTER_SANITIZE_STRIPPED);
        $post = (new article())->findById($id);
        if ($post) {
            $image = $post->cover;
            if ($post->destroy()) {
                Base64::remove($image);
                $this->message->success("Artigo deletado!!")->flash();
                $json['redirect'] = url();
                echo json_encode($json);
                return;
            }
        }
        header("HTTP/1.0 403 Forbidden");
        return;
    }
}
