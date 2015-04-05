<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 09.03.2015
 * Time: 18:50
 */

namespace View;
use Balon\System;

class Info extends System\View{

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function index($data) {
        $this->loadTop();
        include_once("view/content/other.php");
        //
        $this->loadFullSidebar();
        $this->loadBottom();
    }
}