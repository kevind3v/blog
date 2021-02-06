<?php

namespace Src\App;

use Src\Core\Controller;
use Src\Models\Category as categories;

class Category extends Controller
{

    /** Category Constructor */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /** Display categories page */
    public function form(): void
    {
        $this->view->show("category", [
            "title" => "Nova categoria",
            "categories" => (new categories())->order("title ASC")->find()->fetch(true)
        ]);
    }

    /**
     * Register Category
     *
     * @param array $data
     */
    public function register(array $data): void
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
        $category = new categories();
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
}
