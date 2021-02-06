<?php

namespace Src\Core;

use BrBunny\BrPlates\BrPlates;
use Src\Helpers\Message;

class Controller
{
    /** @var BrPlates */
    protected $view;
    /** @var Message */
    protected $message;

    /** Controller Constructor */
    public function __construct($router)
    {
        $this->view = new BrPlates(BRPLATES);
        $this->view->data(["router" => $router]);
        $this->view->addTemplate("widget", BRPLATES . "/includes");
        $this->message = new Message();
    }
}
