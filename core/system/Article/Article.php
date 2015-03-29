<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 17.02.15
 * Time: 0:23
 */

namespace Balon\System;


use Balon\DBProc;

class Article {

    public $table = "news";

    private $db;



    function __construct() {
        // TODO: Implement __construct() method.
    }

    function loadList($filter) {
        self::getPagination();
        $this->db = DBProc::instance();
        $result = $this->db->select($this->table, false,
            [
                array_keys($filter)[0] => array_values($filter)[0]
            ], 'create_date', false, [0, 5]
        );
        return $result;
    }

    static function getPaginatorLimit() {
        if ($_GET['page']) {
            $page = (int) $_GET['page'];
            $limit = [COUNT_ARTICLE*($page-1),COUNT_ARTICLE];
        }
        else {
            $limit = [0,COUNT_ARTICLE];
        }
        return $limit;
    }

    public static function getPagination($table = 't_news') {
        $db = DBProc::instance();
        if (!empty($_GET['chapters'])) {
            $where = " WHERE `chapter` = ".$_GET['chapters'];
        }
        $count = $db->send_query("SELECT count(`id`) as coun FROM `$table` $where")[0]['coun'];
        //echo $count;
        if ($_GET['page']) $page = $_GET['page'];
        else $page = 1;
        $count = intval($count/COUNT_ARTICLE);
        /*echo "a = ".(3+4);
        echo ($count%COUNT_ARTICLE);*/
        // magic O_o
        if ($count%COUNT_ARTICLE != 0) {
            $count += 1;
        }
        for ($i = 1; $i <= $count; $i++) {
            $active = false;
            $url = preg_replace("/\?.*/", "", $_SERVER['REQUEST_URI']);
            $array['href'] = $url."?";
            foreach ($_GET as $key => $val) {
                if ($key != "page") {
                    $array['href'] .= "$key=$val&";
                }
            }
            $array['href'] .= "page=$i";
            $array['active'] = ($i == $page) ? true : false;
            $array['num'] = $i;
            $result[] = $array;
        }
        return $result;
    }

}