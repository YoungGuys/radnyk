<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 24.02.2015
 * Time: 00:25
 */

namespace Controller;
use Balon\System;

class Blog extends System\Controller{

    function __construct(){
        $this->model = new \Model\Blog();
        $this->view = new \View\Blog();
        // TODO: Implement __construct() method.
    }

    public function index(){
        $this->view->index();
    }
} 