<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 09.03.2015
 * Time: 18:50
 */

namespace Controller;
use Balon\System;

class Info extends System\Controller{

    function __construct(){
        $this->model = new \Model\Info();
        $this->view = new \View\Info();
        // TODO: Implement __construct() method.
    }

    public function index(){
        $this->about();
    }


    public function advertising() {
        $data = $this->model->getInfo(1);
        $this->view->index($data);
    }

    public function about() {
        $data = $this->model->getInfo(2);
        $this->view->index($data);
    }

    public function contacts() {
        $data = $this->model->getInfo(3);
        $this->view->index($data);
    }

} 