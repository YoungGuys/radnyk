<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 23.02.2015
 * Time: 00:58
 */

namespace View;
use Balon\System;
use Controller\Sidebar;

class Video extends System\View{

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function index($data) {
        extract($data);
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        include_once("view/content/video.php");
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadFooter();
        $this->loadModal();
    }

    public function show($data) {
        //extract($data);
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadFooter();
        $this->loadModal();
    }
}