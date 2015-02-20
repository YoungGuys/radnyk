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

class News extends System\Model{

    const COUNT = 10;

    function __construct()
    {
        parent::__construct();
        // TODO: Implement __construct() method.
    }

    public function loadNews($id)
    {
        $cache = Cache::instance();
        $sql = "SELECT n.*,c.`name` FROM `t_news` AS n LEFT JOIN `t_chapter` AS c
          ON n.`id_chapter` = c.`id` WHERE n.`id` = ".$_GET['id'];
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
        $nameCacheFile = "news".$result[0]['id_chapter'];
        $cache->incrementViews($nameCacheFile,$_GET['id']);
        $result[0]['views'] = $cache->get($nameCacheFile,$_GET['id'])['views'];
        //print_r ($result);
        return $result[0];
    }

    public function loadList($id) {
        $result = $this->db->select("news",[false],
            [
                "id_chapter" => $id
            ], "create_date",false,[0,10]);
        $nameCacheFile = "news".$id;
        $results = $this->prepareList($result,$nameCacheFile);
        return $results;
    }


    public function loadFeaturedList($id)
    {
        $cache = Cache::instance();
        $nameCacheFile = "news".$id;
        $newsList = $cache->getCache($nameCacheFile);
        //TODO: змінити, коли к-ть статей нереально великою
        foreach($newsList as $key => $val) {
            $newsList[$key]['id'] = $key;
        }
        //сортуємо масив по кількості переглядів
        usort($newsList,function($one, $two) {
            if ($two['views'] > $one['views']) {
                return 1;
            }
            else {
                return 0;
            }
        });
        $or = "";
        $listResultId = "";
        for ($i = 0;$i < self::COUNT;$i++) {
            if ($newsList[$i]['id']) {
                $listResultId .= "$or `id` = ".$newsList[$i]['id'];
                $or = " OR ";
            }
        }
        $result = $this->db->send_query("SELECT * FROM `t_news` WHERE `id_chapter` = $id LIMIT 0,1000");
        //print_r ($result);
        $exit = false;
        $n = $j = 0;
        while (!$exit && $j < count($result)) {
            for ($i = 0;$i < self::COUNT;$i++) {
                if ($newsList[$i]['id'] == $result[$j]['id']) {
                    $n++;
                    $results[] = $result[$j];
                    unset($result[$j]);
                }
            }
            if ($n > 9) $exit = true;
            $j++;
        }

        print_r ($results);
        echo "<br>"."<br>";
        $nameCacheFile = "news".$id;
        $results = $this->prepareList($results,$nameCacheFile);
        print_r ($results);
        return $results;
    }


    private function prepareList($result, $nameCacheFile)
    {
        $cache = Cache::instance();
        foreach ($result as $key => $val) {
            $array[] = $val['id'];
        }
        $views = $cache->get($nameCacheFile,$array);
        foreach ($result as $key => $val) {
            // тут може бути кількість коментарів
            $result[$key]['text'] = mb_substr($result[$key]['text'],0,250,'UTF-8')."...";
            $result[$key]['views'] = $views[$val['id']]['views'];
            $date = new \DateTime($val['create_date']);
            $day = $date->format("j");
            $month = \Balon\Date::getMonth($date->format("n"));
            $time = $date->format("H:i");
            $result[$key]['time'] = "$time";
            if (date("j") == $date->format("j")
                && $date->format("n") == date('n')
                && $date->format("Y") == date('Y')) {
                $results['сьогодні'][] = $result[$key];
            }
            elseif (date("j") - $date->format("j") == 1
                && $date->format("n") == date('n')
                && $date->format("Y") == date('Y')) {
                $results['вчора'][] = $result[$key];
            }
            else {
                $results["$day $month"][] = $result[$key];
            }
        }
        return $results;
    }


}