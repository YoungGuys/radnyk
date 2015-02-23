<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 23.02.2015
 * Time: 00:58
 */

namespace Controller;
use Balon\System;

class Video extends System\Controller{

    function __construct(){
        $this->model = new \Model\Video();
        $this->view = new \View\Video();
        // TODO: Implement __construct() method.
    }

    public function index(){
        $data = $this->model->index();
        $this->view->index($data);
    }

    public function show() {
        $data = $this->model->show();
        $this->view->show($data);
    }
} 