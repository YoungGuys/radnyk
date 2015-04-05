<?php
/**
 * Created by PhpStorm.
 * User: Balon
 * Date: 31.03.2015
 * Time: 15:08
 */

namespace Model;
use Balon\DBProc;
use Balon\System;

class Admin extends System\Model{

    function __construct(){
        $this->db = DBProc::instance();
        // TODO: Implement __construct() method.
    }

    public function index(){

    }

    public function getAllUsers() {
        $array = $this->db->select("users");
        return $array;
    }

    public function setStatus($id, $role) {
        if (System\User::trueAdmin()) {
            echo $id.$role;
            $this->db->update("users", ['role' => $role], ['id' => $id]);
            //header("Location:".SITE."Admin/users");
        }
    }
}