<?php

namespace Model;

use Balon\Cache;
use Balon\Date;
use Balon\DBProc;
use Balon\System\Article;
use Balon\System\Model;

class Main extends Model{

    //private $db;

    function __construct() {
        $this->array = ["politics" => 1, "world" => 2, "economic" => 3, "culture" => 4, "sport" => 5];
        $this->db = DBProc::instance();// TODO: comment this when finish
    }

    public function index() {
        $this->db = DBProc::instance();
        $data['slider'] = $this->loadSlider();
        foreach ($this->array as $key => $val) {
            $data[$key] = $this->loadNewsList($val);
        }
        return $data;
    }

    private function loadSlider() {
        $result = $this->db->select("slider");
        return $result;
    }

    private function loadNewsList($chapter) {
        $article = new Article();
        $result = $article->loadList(["id_chapter" => $chapter]);
        foreach ($result as $key => $val) {
            $date = new \DateTime($val['create_date']);
            $day = $date->format("j");
            $month = Date::getMonth($date->format("n"));
            $time = $date->format("H:i");
            $result[$key]['create_date'] = "$day $month, $time";
            $arrayForViews[] = $val['id'];
            if ($val['most'] && ($j%3 == 0)) {
                $newsWithMost[] = $key;
            }
            $j++;

        }
        $cache = Cache::instance();
        $arrayViews = $cache->get("news$chapter",$arrayForViews);
        foreach ($result as $key => $val) {
            $result[$key]['views'] = $arrayViews[$val['id']]['views'];
            $result[$key]['href'] = "?title=".str_replace(" ","_",$result[$key]['title'])."&id=".$result[$key]['id'];
            if ($val['most'] == "on") {
                $data['most'] = $result[$key];
                $a = true;
            }
            else {
                $data['data'][] = $result[$key];
            }
        }
        //if ($a) array_pop($data['data']);
        return $data;
    }


}