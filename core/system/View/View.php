<?php
/**
 * Created by PhpStorm.
 * User: Андрій
 * Date: 02.01.2015
 * Time: 23:48
 */

namespace Balon\System;


use Balon\DBProc;
use Balon\OAuth;

abstract class View {

    function __construct() {
        // TODO: Implement __construct() method.
    }

    public function loadContent($params = []) {
        include_once("./view/content.php");
    }

    protected function loadHead($params = []) {
        if (file_exists("./view/head.php")) {
            include_once("./view/head.php");
        }
    }

    protected function loadFooter($params = []) {
        $db = DBProc::instance();
        $important = $db->select("news",false,['important' => "on"]);
        foreach ($important as $key => &$val) {
            $date = new \DateTime($val['create_date']);
            $val['create_date'] = $date->format("H:i");
        }
        if (file_exists("./view/footer.php")) {
            include_once("./view/footer.php");
        }
    }

    protected function loadHeader($params = []) {
        $db = DBProc::instance();
        $quote = $db->select("else",false,['id' => 1])[0];
        if (file_exists("./view/header.php")) {
            include_once("./view/header.php");
        }
    }

    protected function loadMenu($params = []) {
        if (file_exists("./view/menu.php")) {
            include_once("./view/menu.php");
        }
    }

    protected function loadSidebar($params = []) {
        if (file_exists("./view/sidebar.php")) {
            include_once("./view/sidebar.php");
        }
    }

    protected function loadModal($params = []) {
        $oauth = new OAuth();
        if (file_exists("./view/modal.php")) {
            include_once("./view/modal.php");
        } elseif (file_exists("./view/none_element.php")) {
            include_once("./view/none_element.php");
        }
    }
}