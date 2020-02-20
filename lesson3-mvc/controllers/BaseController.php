<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 2/20/20
 * Time: 08:52
 */

namespace Controllers;

use Jenssegers\Blade\Blade;
class BaseController
{
    public function render($views, $data){
        $blade = new Blade('views', 'storage');
        echo $blade->make($views, $data)->render();
    }
}