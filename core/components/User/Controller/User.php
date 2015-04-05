<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 06.04.2015
 * Time: 00:41
 */

namespace Controller;
use Balon\System;

class User extends System\Controller{

    function __construct(){
        $this->model = new \Model\User();
        $this->view = new \View\User();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }

    public function logout(){
        foreach ($_COOKIE as $key => $val) {
            setcookie($key,$val,time()-1000, "/");
            session_destroy();
        }
        header("Location:".SITE);
    }
} 