<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 22.02.2015
 * Time: 18:16
 */

namespace View;

use Balon\System;
use Controller\Sidebar;

class Photo extends System\View {

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function index($data) {
        /*$most = $data['most'];
        $data = $data['data'];*/
        extract($data);
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        include_once("view/content/photo.php");
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadModal();
        $this->loadFooter();
    }


    public function show($data) {
        extract($data);
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        include_once("view/content/photoone.php");
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadModal();
        $this->loadFooter();
    }
}