<?php
class curlModel extends baseModel{
	public function getList(){
		$return = array();
		$return[0] = array('link'=>'/curl/version','name'=>'curl_version');
		$return[1] = array('link'=>'/curl/init','name'=>'curl_init');
		return $return;
	}
}
?>
