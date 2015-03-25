<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 24.02.2015
 * Time: 00:25
 */

namespace View;
use Balon\System;
use Controller\Sidebar;

class Blog extends System\View{

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function index($data) {
        extract($data);
        $this->loadHead();
        $this->loadHEader();
        $this->loadContent();
        include_once("view/content/blogy.php");
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadFooter();
        $this->loadModal();
    }

    public function viewLoadBlog($data) {
        extract($data);
        $this->loadHead();
        $this->loadHEader();
        $this->loadContent();
        include_once("view/content/blog_note.php");

        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadFooter();
        $this->loadModal();
    }

    public function add() {
        $this->loadTop();
        include_once("view/content/add_blog.php");
        $this->loadFullSidebar();
        $this->loadBottom();
    }
}