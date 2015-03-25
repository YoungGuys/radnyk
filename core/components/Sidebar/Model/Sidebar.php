<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 22.02.2015
 * Time: 18:43
 */

namespace Model;
use Balon\Cache;
use Balon\Date;
use Balon\System;
use Balon\DBProc;

class Sidebar extends System\Model{

    //private $db;

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }


    public function loadVideo() {
        $lastVideo = $this->db->select("videolist",false,false, "create_date",false,[0,3]);
        foreach ($lastVideo as $key => $val) {
            $lastVideo[$key]['create_date'] = Date::reformatDate($val['create_date']);
            $lastVideo[$key]['chapter'] = System\Model::$nameChapter[$val['id_chapter']];
            $arrayForView[] = $val['id'];
        }
        $cache = Cache::instance();
        $arrayViews = $cache->get("video",$arrayForView);
        foreach ($lastVideo as $key => $val) {
            $lastVideo[$key]['views'] = $arrayViews[$val['id']]['views'];
        }
        $popular = $cache->getCache("video");
        uasort($popular, function ($one, $two) {
            if ($two['views'] > $one['views']) {
                return 1;
            } else {
                return 0;
            }
        });
        $popularViews = array_slice($popular,0,3,true);
        $where = "";
        $or = "";
        foreach ($popularViews as $key => $val) {
            $where .= "$or `id` = {$key}";
            $or = " OR ";
        }
        $sql = "SELECT * FROM `t_videolist` WHERE $where ";
        $popular = $this->db->send_query($sql);
        foreach ($popularViews as $key => $val) {
            foreach ($popular as $k => $v) {
                if ($key == $v['id']) {
                    $v['views'] = $val['views'];
                    $v['create_date'] = Date::reformatDate($v['create_date']);
                    $v['chapter'] = System\Model::$nameChapter[$v['id_chapter']];
                    $populars[] = $v;
                    continue;
                }
            }
        }
        return ["last" => $lastVideo, "popular" => $populars];
    }
}