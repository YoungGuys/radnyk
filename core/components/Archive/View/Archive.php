<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 26.02.2015
 * Time: 01:01
 */

namespace View;
use Balon\System;

class Archive extends System\View{

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function index() {
        $this->loadHead();
        $this->loadHEader();
        $this->loadContent();
        include_once("view/content/archive.php");
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadFooter();
        $this->loadModal();
    }
}