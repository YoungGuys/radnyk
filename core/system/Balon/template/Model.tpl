<?php
/**
 * Created by PhpStorm.
 * User: {{user}}
 * Date: {{date}}
 * Time: {{time}}
 */

namespace Model;
use Balon\System;

class {{name}} extends System\Model{

    private $db;

    function __construct()
    {
        $this->db = DBProc::instance();
// TODO: Implement __construct() method.
}

public function index()
{

}
}