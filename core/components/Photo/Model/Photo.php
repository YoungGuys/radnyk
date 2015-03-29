<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 22.02.2015
 * Time: 18:16
 */

namespace Model;

use Balon\Cache;
use Balon\Date;
use Balon\DBProc;
use Balon\System;

class Photo extends System\Model {

    //private $db;

    private $count = 7;

    function __construct() {
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index() {
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
        $list = $this->db->select("photolist",false,$where,"create_date",false,$limit);
        $unset = false;
        $cache = Cache::instance();
        $ids = $cache->get('photo',$ids);
        foreach ($list as $key => $val) {
            $list[$key]['chapter'] =  self::$nameChapter[$val['id_chapter']];
            $list[$key]['create_date'] = Date::reformatDate($val['create_date']);
            $list[$key]['description'] = trim($list[$key]['description']);
            $list[$key]['views'] = $ids[$val['id']] ? $ids[$val['id']]['views'] : 0;
            $list[$key]['href'] = SITE."Photo/show?title=".
                str_replace(" ","+",$val['title'])."&id=".$val['id'];
            $ids[] = $val['id'];
            if ($val['most'] == "on") {
                $most = $list[$key];
                $unset = true;
                unset($list[$key]);
            }
        }
        if (!$unset) {
            if (count($list) > $this->count) array_pop($list);
            $most = $this->db->select("photolist",false,["most" => "on",$where])[0];
            $most['chapter'] = self::$nameChapter[$most['id_chapter']];
            $most['create_date'] = Date::reformatDate($most['create_date']);
        }
        $data['most'] = $most;
        $data['data'] = $list;
        if (!$_GET['page'] || count($list)%($this->count-1) == 0) {
            $data['limitHref'] = "?";
            foreach ($_GET as $key => $val) {
                $data['limitHref'] .= $key."=".$val."&";
            }
            $data['limitHref'] .= "page=".($_GET['page']+1);
        }
        return $data;
    }


    public function show() {
        $id = (int) $_GET['id'];
        $cache = Cache::instance();
        $views = $cache->incrementViews("photo",$id);
        $data = $this->db->select("photolist", false, ['id' => $id])[0];
        $list = $this->db->select("photo", false, ['id_list' =>$data['id']],'order');
        $data['views'] = $views;
        $array['photo'] = $list;
        $array['data'] = $data;
        $array['chapter'] = News::$nameChapter[$data['id_chapter']];
        return ($array);

    }
}