<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 22.02.2015
 * Time: 18:16
 */

namespace Controller;

use Balon\System;

class Photo extends System\Controller {

    function __construct() {
        $this->model = new \Model\Photo();
        $this->view = new \View\Photo();
        // TODO: Implement __construct() method.
    }

    public function index() {
        $data = $this->model->index();
        $this->view->index($data);
    }
} 