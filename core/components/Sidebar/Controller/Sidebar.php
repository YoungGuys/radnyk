<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 22.02.2015
 * Time: 18:43
 */

namespace Controller;
use Balon\System;

class Sidebar extends System\Controller{

    function __construct(){
        $this->model = new \Model\Sidebar();
        $this->view = new \View\Sidebar();
        // TODO: Implement __construct() method.
    }

    public function index(){
        header("Location:".SITE);
    }

    public function loadSidebar($components = []) {
        if ($components) {
            foreach ($components as $key => $val) {
                $method = "load".$val;
                if (method_exists($this->model,$method)) {
                    $data = $this->model->$method();
                }
                $this->view->loadComponent($val, $data);
            }
        }
    }
} 