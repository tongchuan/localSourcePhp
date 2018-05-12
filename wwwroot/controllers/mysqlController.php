<?php
	class mysqlController extends baseController{
		
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			$mysql_conf = array(
	    'host'    => '127.0.0.1:3306', 
	    // 'db'      => 'webpython', 
	    'db'      => 'mysql', 
	    'db_user' => 'root', 
	    'db_pwd'  => 'root', 
	    );
	    $mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
			if (!$mysql_conn) {
			    die("could not connect to the database:\n" . mysql_error());//诊断连接错误
			}
			mysql_query("set names 'utf8'");//编码转化
			$select_db = mysql_select_db($mysql_conf['db']);
			if (!$select_db) {
			    die("could not connect to the db:\n" .  mysql_error());
			}
			$sql = "select * from user;";
			$res = mysql_query($sql);
			if (!$res) {
			    die("could get the res:\n" . mysql_error());
			}

			while ($row = mysql_fetch_assoc($res)) {
			    print_r($row);
			}

			mysql_close($mysql_conn);
			echo "string";
		}


		
	}
