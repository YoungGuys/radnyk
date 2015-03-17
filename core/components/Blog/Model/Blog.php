<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 24.02.2015
 * Time: 00:25
 */

namespace Model;
use Balon\Date;
use Balon\DBProc;
use Balon\System;

class Blog extends System\Model{

    //private $db;

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
        $array = $this->db->join(
            [
                "users" => "id",
                "blog" => "id_author"
            ]
        );
        foreach ($array as $key => $val) {
            $array[$key]['create_date'] = Date::reformatDate($val['create_date']);
            $array[$key]['text'] = mb_substr($val['text'], 0, 250, 'UTF-8') . "...";
        }
        $array['data'] = $array;
        return $array;
    }

    public function modelGetBlog() {
        $data = $this->db->join(
            [
                "users" => "id",
                "blog" => "id_author"
            ], ["blog","id",$_GET['id']]
        )[0];
        return $data;
    }
}