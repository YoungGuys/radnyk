<?php

/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 17.02.2015
 * Time: 01:44
 */

namespace Model;

use Balon\Cache;
use Balon\DBProc;
use Balon\System;

class News extends System\Model {

    const COUNT = 10;

    private $idChapter;

    function __construct() {
        $this->db = DBProc::instance();
        //parent::__construct();
        // TODO: Implement __construct() method.
        $this->nameChapter = [1 => "Політика", 2 => "Світ", 3 => "Економіка", 4 => "Культура", 5 => "Спорт"];
    }

    public function loadNews($id) {
        $cache = Cache::instance();
        $sql = "SELECT n.*,c.`name` FROM `t_news` AS n LEFT JOIN `t_chapter` AS c
          ON n.`id_chapter` = c.`id` WHERE n.`id` = " . $_GET['id'];
        $result = $this->db->send_query($sql);
        //print_r ($result);
        //$result = $this->db->select("news",false,['id' => $id]);
        foreach ($result as $key => $val) {
            $date = new \DateTime($val['create_date']);
            $day = $date->format("j");
            $month = \Balon\Date::getMonth($date->format("n"));
            $time = $date->format("H:i");
            $result[$key]['create_date'] = "$day $month, $time";
        }
        $nameCacheFile = "news" . $result[0]['id_chapter'];
        $cache->incrementViews($nameCacheFile, $_GET['id']);
        $result[0]['views'] = $cache->get($nameCacheFile, $_GET['id'])['views'];
        //print_r ($result);
        return $result[0];
    }

    public function course() {
        echo "aa";
    }

    public function loadList($id) {
        include_once("core/config.php");
        $this->idChapter = $id;
        $result = $this->db->select("news", [false],
            [
                "id_chapter" => $id
            ], "create_date", false, System\Article::getPaginatorLimit());
        $unset = false;
        foreach ($result as $key => $val) {
            if ($val['most'] == "on") {
                $most[0] = $result[$key];
                unset($result[$key]);
                $unset = true;
                break;
            }
        }
        if (!$unset) {
            $most = $this->db->select("news",false,["id_chapter" => $id, "most" => "on"]);
            //array_pop($result);
        }
        // reformat create date for most news


        $date = new \DateTime($most['create_date']);
        $day = $date->format("j");
        $month = \Balon\Date::getMonth($date->format("n"));
        $time = $date->format("H:i");
        $most['create_date'] = "$day $month, $time";
        $cache = Cache::instance();
        $most['views'] = $cache->getCache("news".$id,$most['id'])['views'];
        $most['text'] = mb_substr($most['text'], 0, 250, 'UTF-8') . "...";
        $nameCacheFile = "news" . $id;
        $most = $this->prepareList([$most[0]],$nameCacheFile);
        $results = $this->prepareList($result, $nameCacheFile);
        $results['most'] = $most;
        /*echo "<pre>";
        var_dump($results);*/
        return $results;
    }


    public function loadFeaturedList($id) {
        $this->idChapter = $id;
        $cache = Cache::instance();
        $nameCacheFile = "news" . $id;
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
                $listResultId .= "$or `id` = " . $newsList[$i]['id'];
                $or = " OR ";
            }
        }
        $result = $this->db->send_query("SELECT * FROM `t_news` WHERE `id_chapter` = $id LIMIT 0,1000");
        $exit = false;
        $n = $j = 0;
        $count = count($result);
        while (!$exit && $j < $count) {
            for ($i = 0; $i < self::COUNT; $i++) {
                if ($newsList[$i]['id'] == $result[$j]['id'] && $result[$j]['id']) {
                    $n++;
                    $result[$j]['views'] = $newsList[$i]['views'];
                    $results[] = $result[$j];
                    unset($result[$j]);
                }
            }
            if ($n > 9) {
                $exit = true;
                echo "<br><br>EXIT<br><br><br>";
            }
            $j++;
        }
        usort($results, function ($one, $two) {
            if ($two['views'] > $one['views']) {
                return 1;
            } else {
                return 0;
            }
        });
        $results = array_merge($results, $result);
        $nameCacheFile = "news" . $id;
        $results = $this->prepareList($results, $nameCacheFile);
        return $results;
    }


    private function prepareList($result, $nameCacheFile) {
        $cache = Cache::instance();
        foreach ($result as $key => $val) {
            $array[] = $val['id'];
        }
        $views = $cache->get($nameCacheFile, $array);
        foreach ($result as $key => $val) {
            // тут може бути кількість коментарів
            $result[$key]['text'] = mb_substr($result[$key]['text'], 0, 250, 'UTF-8') . "...";
            $result[$key]['views'] = $views[$val['id']]['views'];
            $date = new \DateTime($val['create_date']);
            $day = $date->format("j");
            $month = \Balon\Date::getMonth($date->format("n"));
            $time = $date->format("H:i");
            $result[$key]['time'] = "$time";
            if (date("j") == $date->format("j")
                && $date->format("n") == date('n')
                && $date->format("Y") == date('Y')
            ) {
                $results['сьогодні'][] = $result[$key];
            } elseif (date("j") - $date->format("j") == 1
                && $date->format("n") == date('n')
                && $date->format("Y") == date('Y')
            ) {
                $results['вчора'][] = $result[$key];
            } else {
                $results["$day $month"][] = $result[$key];
            }
        }
        $result['data'] = $results;
        $result['nameChapter'] = $this->nameChapter[$this->idChapter];
        return $result;
    }


}