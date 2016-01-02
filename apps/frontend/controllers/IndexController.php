<?php

namespace Modules\Frontend\Controllers;

use Modules\Backend\Controllers\XController;
use Phalcon\Mvc\View;
use Modules\Frontend\Models\Users;

class IndexController extends XController
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
