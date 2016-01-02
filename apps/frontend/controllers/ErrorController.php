<?php
/**
 * Created by PhpStorm.
 * User: HOANGNGHIA
 * Date: 1/2/2016
 * Time: 10:34 AM
 */

class ErrorController extends ControllerBase
{
    public function error404Action()
    {
        $this->response->setHeader('HTTP/1.0 404','Not Found');
    }
}