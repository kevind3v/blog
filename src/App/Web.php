<?php

namespace Src\App;

use BrBunny\BrPlates\BrPlates;
use Src\Helpers\Message;
use Src\Models\Category;

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
        $this->message = new Message();
    }

    /** Home Controller */
    public function home(): void
    {
        $this->view->show("blog", []);
    }

    /** About Controller */
    public function about(): void
    {
        $this->view->show("about", [
            "title" => "Sobre nós"
        ]);
    }

    /** Show Form Controller */
    public function showForm(): void
    {
        $this->view->show("form", [
            "title" => "Novo artigo",
            "categories" => (new Category())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /** Register Controller */
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
    }

    /** Show Category Controller */
    public function showCategory(): void
    {
        $this->view->show("category", [
            "title" => "Nova categoria",
            "categories" => (new Category())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /** @param array $data */
    public function category(array $data): void
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
