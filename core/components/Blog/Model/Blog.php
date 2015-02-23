<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 24.02.2015
 * Time: 00:25
 */

namespace Model;
use Balon\System;

class Blog extends System\Model{

    private $db;

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }
}