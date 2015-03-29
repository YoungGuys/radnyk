<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 24.02.2015
 * Time: 00:25
 */

namespace Model;
use Balon\Cache;
use Balon\Date;
use Balon\DBProc;
use Balon\System;

class Blog extends System\Model{

    //private $db;

    const COUNT = 3;

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }



    //TODO: make this method private
    public function save() {
        if (System\User::trueUser()) {
            $title = $_POST['name'];
            $chapter = $_POST['type'];
            $text = $_POST['text'];
            System\File::resizeImage($_FILES['photo']['tmp_name'], "lib/image/blog/".$_FILES['photo']['name'], [300]);
            $id = $_COOKIE['user_id'];
            $this->db->insert("blog",["title" => $title, "text" => $text, "id_author" => $id, "chapter" => $chapter,
                "image" => $_FILES['photo']['name']]);
        }
    }

    public function modelGetAllBlog() {
        $cache = Cache::instance();
        $where = false;
        if ((int) $_GET['chapters']) {
            $id = (int) $_GET['chapters'];
            $where = ["blog",'chapter', $id];
        }
        $limit = System\Article::getPaginatorLimit();
        $array = $this->db->join(
            [
                "users" => "id",
                "blog" => "id_author"
            ], $where, ["blog","create_date"], false, $limit
        );
        foreach ($array as $key => $val) {
            $ids[] = $val['id'];
            $array[$key]['create_date'] = Date::reformatDate($val['create_date']);
            $array[$key]['text'] = mb_substr($val['text'], 0, 250, 'UTF-8') . "...";
        }
        if (!empty($_GET['chapters'])) {
            $views = $cache->get("blog".(int) $_GET['chapters'], $ids);
        }
        else {
            $views = $cache->get("blog",$ids);
            $views = [];
            foreach (News::$nameChapter as $key => $val) {
                if ($viewsList = $cache->get("blog".$key,$ids)) {
                    foreach ($viewsList as $key => $val) {
                        if ($val) {
                            $views[$key] = $val;
                        }
                        //array_push($views, $viewsList);
                    }
                }
            }
        }
        foreach ($array as $key => $val) {
            $array[$key]['views'] = $views[$val['id']]['views'];
        }
        $array['data'] = $array;
        $array['pagination'] = System\Article::getPagination('t_blog');
        return $array;
    }

    public function getAllPopularBlog($id) {
        $cache = Cache::instance();
        if ($id) {
            $nameCacheFile = "blog$id";
        }
        else {
            $nameCacheFile = "blog";
        }
        $newsList = $cache->getCache($nameCacheFile);
        //TODO: змінити, коли к-ть статей нереально великою
        foreach ($newsList as $key => $val) {
            $newsList[$key]['id'] = $key;
        }
        //сортуємо масив по кількості переглядів
        usort($newsList, function ($one, $two) {
            if ($two['views'] > $one['views']) {
                return 1;
            } else {
                return 0;
            }
        });
        $or = "";
        $listResultId = "";
        for ($i = 0; $i < self::COUNT; $i++) {
            if ($newsList[$i]['id']) {
                $listResultId .= "$or b.`id` = " . $newsList[$i]['id'];
                $or = " OR ";
            }
        }
        $result = $this->db->send_query("SELECT * FROM `t_users` AS u LEFT JOIN `t_blog` AS b ON u.`id` = b.`id_author`
            WHERE $listResultId LIMIT 0,1000");
        $exit = false;
        $n = $j = 0;
        $count = count($result);
        for ($i = 0; $i < self::COUNT; $i++) {
            for ($j = 0;$j < $count;$j++) {
                if ($newsList[$i]['id'] == $result[$j]['id'] && $result[$j]['id']) {
                    $result[$j]['views'] = $newsList[$i]['views'];
                    $result[$j]['create_date'] = Date::reformatDate($val['create_date']);
                    $result[$j]['text'] = mb_substr($result[$j]['text'], 0, 250, 'UTF-8') . "...";
                    $array[] = $result[$j];
                    unset($result[$j]);
                }
            }
        }


        /*$cache = Cache::instance();
        $where = false;
        if ((int) $_GET['chapters']) {
            $id = (int) $_GET['chapters'];
            $where = ["blog",'chapter', $id];
        }
        $array = $this->db->join(
            [
                "users" => "id",
                "blog" => "id_author"
            ], $where
        );
        foreach ($array as $key => $val) {
            $ids[] = $val['id'];
            $array[$key]['create_date'] = Date::reformatDate($val['create_date']);
            $array[$key]['text'] = mb_substr($val['text'], 0, 250, 'UTF-8') . "...";
        }
        $views = $cache->get("blog", $ids);
        foreach ($array as $key => $val) {
            $array[$key]['views'] = $views[$val['id']]['views'];
        }*/
        $array['data'] = $array;
        $array['pagination'] = System\Article::getPagination('t_blog');
        return $array;
    }

    public function modelGetBlog() {
        $id = (int) $_GET['id'];
        $data = $this->db->join(
            [
                "users" => "id",
                "blog" => "id_author"
            ], ["blog","id",$id]
        )[0];
        if ($data) {
            $cache = Cache::instance();
            if ($data['views'] = $cache->incrementViews("blog".$data['chapter'], $id))
                $data['views'] = $cache->incrementViews("blog", $id);
            //$data['views'] = $cache->getInfo("blog", $id)[0];
        }
        //$result['last'] = $this->db->select('blog');
        $result['data'] = $data;
        return $result;
    }
}