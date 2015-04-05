<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 26.02.2015
 * Time: 01:01
 */

namespace Model;
use Balon\DBProc;
use Balon\System;

class Archive extends System\Model{

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }


}