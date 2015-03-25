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
        if (!isset($_GET['popular'])) {
            $data = $this->model->modelGetAllBlog();
        }
        else {
            $data = $this->model->getAllPopularBlog($_GET['chapters']);
        }
        $hrefPopular = $hrefLast = SITE."Blog?";
        //"<?php echo $_SERVER['REQUEST_URI']; if ($_GET['chapters']) echo "&"; else echo "?"time"
        foreach ($_GET as $key => $val) {
            if ($key != "time" && $key != "popular") {
                $hrefPopular .= $key."=".$val."&";
                $hrefLast .= $key."=".$val."&";
            }
        }
        $hrefPopular .= "popular";
        $hrefLast .= "time";
        $data['hrefLast'] = $hrefLast;
        $data['hrefPopular'] = $hrefPopular;
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