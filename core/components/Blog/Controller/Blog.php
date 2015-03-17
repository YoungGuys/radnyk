<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 24.02.2015
 * Time: 00:25
 */

namespace Controller;
use Balon\System;
use Model\News;

class Blog extends System\Controller{

    function __construct(){
        $this->model = new \Model\Blog();
        $this->view = new \View\Blog();
        // TODO: Implement __construct() method.
    }

    public function index(){
        $data = $this->model->modelGetAllBlog();
        $this->view->index($data);
    }


    public function show() {
        $data = $this->model->modelGetBlog();
        $this->view->viewLoadBlog($data);
    }

    public function add() {
        if (System\User::trueAdmin()) {
            $this->view->add();
        }
        else {
            System\User::redirect();
        }
    }
    
    public function save() {
        print_r ($_POST);
        print_r ($_FILES);
        $this->model->save();
    }
} 