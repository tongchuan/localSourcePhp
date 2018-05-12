<?php
/**
* PHP Basic MVC Framework Part 7 - Router
* By John White (@Jontyy)
*/
// error_reporting(0);
// echo "string";
// exit();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
define('SITE_PATH',realpath(dirname(__FILE__)).'/');
// header('content-type:application:json;charset=utf-8'); 
header('Content-type:application/json;charset=utf-8');
// Content-Type=application/json;charset=UTF-8 
// header('Access-Control-Allow-Origin:http://localhost:8080'); 
header('Access-Control-Allow-Origin:*'); 
#header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,PUT,DELETE');
// header('Access-Control-Allow-Methods:POST,GET');  
// header('Access-Control-Allow-Headers:Content-Type, Authorization, X-Requested-With');
header('Access-Control-Allow-Headers:DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type');


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