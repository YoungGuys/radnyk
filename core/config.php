<?php
/**
 * @author balon
 * @copyright 2013
 */



    $db_host = "localhost";     //Ім"я серверу
    $db_user = "root";                  //Користувач
    $db_passw = "";                     //Пароль
    $db_name = "radnyk";                       //Ім"я бази данних
/*
    $db_host = "radnyk00.mysql.ukraine.com.ua";     //Ім"я серверу
    $db_user = "radnyk00_db";                  //Користувач
    $db_passw = "utJ3tML2";                     //Пароль
    $db_name = "radnyk00_db";                       //Ім"я бази данних*/

    $_SESSION['db_name'] = $db_name;
    $_SESSION['prefix'] = "t";   //prefix in name table

    $this->dev_mod = 1;

    define("COUNT_ARTICLE",10);


?>
