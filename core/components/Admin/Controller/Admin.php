<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 31.03.2015
 * Time: 15:08
 */

namespace Controller;
use Balon\System;

class Admin extends System\Controller{

    function __construct(){
        if (!System\User::trueAdmin()) {
            System\User::redirect();
        }
        $this->model = new \Model\Admin();
        $this->view = new \View\Admin();
        // TODO: Implement __construct() method.
    }

    public function index(){
    }

    public function users() {
        $data = $this->model->getAllUsers();
        $this->view->loadAllUsers($data);
    }

    public function setstatus() {
        $this->model->setStatus($_GET['id'], $_GET['role']);
    }
} 