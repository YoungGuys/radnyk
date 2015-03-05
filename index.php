<?php

/**
 * @author balon
 * @copyright 2014
 */


session_start();
error_reporting(1);

//$a = microtime(true);
//$_SESSION['a'] = $a;e
require('core/lib/php/autoloader.php');
require('config.php');

define("DEV_MOD",true);

$rout = new \Balon\Routing();
$rout->loadPage();
//$b = microtime(true);

//echo "Time to load Page == ".($b-$a);
?>
