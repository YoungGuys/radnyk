<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 06.04.2015
 * Time: 00:41
 */

namespace Model;
use Balon\DBProc;
use Balon\System;

class User extends System\Model{

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }
}