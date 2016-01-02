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
        //$this->view->setTemplateBefore('404');
        //$this->response->setStatusCode(404, 'Not Found');
        //$this->view->render('404');
    }

}
