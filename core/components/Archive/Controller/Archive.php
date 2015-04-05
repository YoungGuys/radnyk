<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 26.02.2015
 * Time: 01:01
 */

namespace Controller;
use Balon\System;

class Archive extends System\Controller{

    function __construct(){
        $this->model = new \Model\Archive();
        $this->view = new \View\Archive();
        // TODO: Implement __construct() method.
    }

    public function index(){
        $this->view->index();
    }
} 