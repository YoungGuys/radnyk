<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 23.02.2015
 * Time: 00:58
 */

namespace Model;
use Balon\Cache;
use Balon\Date;
use Balon\DBProc;
use Balon\System;

class Video extends System\Model{

    private $db;

    private $count = 7;

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){
        if (!System\User::trueAdmin()) {
            $where['visibility'] = 1;
        }
        else $where = false;
        if ($_GET['chapter'] && $_GET['id'] && self::$nameChapter[$_GET['id']] == $_GET['chapter']) {
            $where['id_chapter'] = $_GET['id'];
        }
        if (!empty($_GET['page'])) {
            $limit = [0, $_GET['page']*($this->count + 1)];
        }
        else {
            $limit = [0,$this->count];
        }
        $list = $this->db->select("videolist",false,$where,"create_date",false,$limit);
        $unset = false;
        if ($list) {
            foreach ($list as $key => $val) {
                $list[$key]['chapter'] = self::$nameChapter[$val['id_chapter']];
                $list[$key]['create_date'] = Date::reformatDate($val['create_date']);
                $list[$key]['description'] = trim($list[$key]['description']);
                $arrayForView[] = $val['id'];
                if ($val['most'] == "on") {
                    $most = $list[$key];
                    $unset = true;
                    unset($list[$key]);
                }
            }
        }
        if (!$unset) {
            if (count($list) >= $this->count) array_pop($list);
            $most = $this->db->select("videolist",false,["most" => "on",$where])[0];
            $arrayForView[] = $most['id'];
            $most['chapter'] = self::$nameChapter[$most['id_chapter']];
            $most['create_date'] = Date::reformatDate($most['create_date']);
        }
        $cache = Cache::instance();
        $arrayViews = $cache->get("video",$arrayForView);
        foreach ($list as $key => $val) {
            $list[$key]['views'] = $arrayViews[$val['id']]['views'];
        }
        $most['views'] = $arrayViews[$most['id']]['views'];
        $data['most'] = $most;
        $data['data'] = $list;
        if ((!$_GET['page'] && count($list)%($this->count) == 0) || count($list)%($this->count-1) == 0) {
            $data['limitHref'] = "?";
            foreach ($_GET as $key => $val) {
                $data['limitHref'] .= $key."=".$val."&";
            }
            $data['limitHref'] .= "page=".($_GET['page']+1);
        }
        return $data;
    }

    public function show() {
        $id = $_GET['id'];
        if (!$id) {header("Location:".SITE); die();}
        $video = $this->db->select("videolist",false,['id' => $id]);
        if ($video) {
            $cache = Cache::instance();
            $data['views'] = $cache->incrementViews("video", $id);
        }
        return $data;
    }
}