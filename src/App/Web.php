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

    public function home()
    {
        $this->view->show("blog", []);
    }

    /**
     * ERROR
     * @param array $data
     * @return void
     */
    public function error(array $data): void
    {
    }
}
