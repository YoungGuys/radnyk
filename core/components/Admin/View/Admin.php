<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 31.03.2015
 * Time: 15:08
 */

namespace View;
use Balon\System;

class Admin extends System\View{

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function index() {

    }

    public function loadAllUsers($data){
        //var_dump($data);
        $this->loadTop();
        include_once("view/content/allUsers.php");
        $this->loadFullSidebar();
        $this->loadBottom();
    }
}