<?php
/**
* PHP Basic MVC Framework Part 7 - Router
* By John White (@Jontyy)
*/
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
define('SITE_PATH',realpath(dirname(__FILE__)).'/');
// header('content-type:application:json;charset=utf-8'); 
// header('Content-type:application/json;charset=utf-8');
// Content-Type=application/json;charset=UTF-8 
header('Access-Control-Allow-Origin:*');  
header('Access-Control-Allow-Methods:POST');  
header('Access-Control-Allow-Headers:Content-Type, Authorization, X-Requested-With');

// header("Content-type: text/html; charset=utf-8"); 
/*Require necessary files.*/
require_once(SITE_PATH.'application/request.php');
require_once(SITE_PATH.'application/mdb.php');
require_once(SITE_PATH.'application/token.php');
require_once(SITE_PATH.'application/curl.php');
require_once(SITE_PATH.'application/router.php');
require_once(SITE_PATH.'application/baseController.php');
require_once(SITE_PATH.'application/baseModel.php');
require_once(SITE_PATH.'application/load.php');
require_once(SITE_PATH.'application/registry.php');
require_once(SITE_PATH.'controllers/errorController.php');
try{
	Router::route(new Request);
}catch(Exception $e){
	$controller = new errorController;
	$controller->error($e->getMessage());
}
?>