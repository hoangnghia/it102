<?php
/**
 * Created by PhpStorm.
 * User: HOANGNGHIA
 * Date: 1/2/2016
 * Time: 9:18 AM
 */

namespace Modules\Frontend\Models;

use Phalcon\Mvc\Model;

class UsersBase extends Model
{
    public $id;

    public $name;

    public $email;

    public function getSource()
    {
        return 'users';
    }

}