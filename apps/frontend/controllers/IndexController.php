<?php

namespace Modules\Frontend\Controllers;


use Phalcon\Mvc\View;
use Modules\Frontend\Models\Users;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $users = Users::find(
            array(
                "order" => "name"
            )
        );
    }
    public function error404Action()
    {
        $this->view->setVart('error404');
    }

}
