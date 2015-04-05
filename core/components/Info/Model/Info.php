<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 09.03.2015
 * Time: 18:50
 */

namespace Model;
use Balon\DBProc;
use Balon\System;

class Info extends System\Model{

    private $nameForId = [1 => "Реклама", 2 => "Про проект", 3 => "Контакти"];

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function getInfo($id){
        $result = $this->db->select("text",false,['id' => $id])[0];
        $result['title'] = $this->nameForId[$id];
        return $result;
    }
}