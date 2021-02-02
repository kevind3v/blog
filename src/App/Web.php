<?php

namespace Src\App;

use BrBunny\BrPlates\BrPlates;

class Web
{
    /** @var BrPlates */
    private $view;

    /** Web Constructor */
    public function __construct($router)
    {
        $this->view = new BrPlates(BRPLATES);
        $this->view->data(["router" => $router]);
    }

    /** Home Controller */
    public function home(): void
    {
        $this->view->show("blog", []);
    }

    public function about(): void
    {
        $this->view->show("about", [
            "title" => "Sobre nós"
        ]);
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
