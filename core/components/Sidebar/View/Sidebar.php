<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 22.02.2015
 * Time: 18:43
 */

namespace View;
use Balon\System;

class Sidebar extends System\View{

    function __construct() {
        include('view/sidebar.php');
        // TODO: Implement __construct() method.
    }

    public function index() {

    }

    public function loadComponent($file, $data = []) {
        extract($data);
        $file = $file.".php";
        include_once("view/sidebar/$file");
    }
}