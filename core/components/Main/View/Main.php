<?php
/**
 * Created by PhpStorm.
 * User: Андрій
 * Date: 02.01.2015
 * Time: 23:43
 */

namespace View;
¡¡¡¡
use Balon\System;
use Controller\Sidebar;

class Main extends System\View {
    function __construct() {
        parent::__construct();
        // TODO: Implement __construct() method.
    }

    function index($data) {
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        //include_once("view/content.php");
        include_once("view/content/site.php");
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadFooter();
        $this->loadModal();
    }

} 