<?php

namespace Modules\Frontend\Controllers;



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
}
