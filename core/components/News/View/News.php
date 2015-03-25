<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 17.02.2015
 * Time: 01:44
 */

namespace View;

use Balon\System;
use Controller\Sidebar;

class News extends System\View {

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function loadNews($data) {
        //TODO: Потрібно реалізувати слайдер в середині новини
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        include('view/content/post.php');
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadModal();
        $this->loadFooter();
    }

    public function loadList($data) {
        $nameChapter = $data['nameChapter'];
        $most = $data['most'][0];
        $pagination = $data['pagination'];
        $data = $data['data'];
        $this->loadHead();
        $this->loadHeader();
        $this->loadContent();
        include('view/content/news.php');
        $sidebar = new Sidebar();
        $sidebar->loadSidebar(["advice","video", "recklama", "blog"]);
        $this->loadModal();
        $this->loadFooter();
    }
}