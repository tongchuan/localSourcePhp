<?php
define('KEY', 'ZHANGTONGCHUAN');
class TOKEN{
	public static function genToken($id){
		$str = json_encode(array(time(),mt_rand(1000,9999),$id));
		return self::authcode($str, 'ENCODE', KEY);
	}
	public static function checkToken($token){
		$str = self::authcode($token, 'DECODE', KEY);
	    $result = json_decode($str);
	    if(is_array($result)){
	        return $result[2];
	    }else{
	        return 'decrypt fail';
	    }
	}
	public static function authcode($string,$operation='DECODE',$key){
		$ckey_length = 4;   // 随机密钥长度 取值 0-32;
	    $key = md5($key);
	    $keya = md5(substr($key, 0, 16));
	    $keyb = md5(substr($key, 16, 16));
	    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
	 
	    $cryptkey = $keya.md5($keya.$keyc);
	    $key_length = strlen($cryptkey);
	 
	    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', 0).substr(md5($string.$keyb), 0, 16).$string;
	    $string_length = strlen($string);
	 
	    $result = '';
	    $box = range(0, 255);
	 
	    $rndkey = array();
	    for($i = 0; $i <= 255; $i++) {
	        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
	    }
	 
	    for($j = $i = 0; $i < 256; $i++) {
	        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
	        $tmp = $box[$i];
	        $box[$i] = $box[$j];
	        $box[$j] = $tmp;
	    }
	 
	    for($a = $j = $i = 0; $i < $string_length; $i++) {
	        $a = ($a + 1) % 256;
	        $j = ($j + $box[$a]) % 256;
	        $tmp = $box[$a];
	        $box[$a] = $box[$j];
	        $box[$j] = $tmp;
	        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	    }
	 
	    if($operation == 'DECODE') {
	        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
	            return substr($result, 26);
	        } else {
	            return '';
	        }
	    } else {
	        return $keyc.str_replace('=', '', base64_encode($result));
	    }
	}
}
/**
define('KEY', '#^DKHSD&*F'); // 定义密钥
 
$id = '123';
$token = genToken($id);
 
echo 'id encrypt token='.$token.'<br>';
echo 'token decrypt id='.checkToken($token);
 
// 创建token
function genToken($id){
    $str = json_encode(array(time(),mt_rand(1000,9999),$id));
    return authcode($str, 'ENCODE', KEY);
}
 
// 验证token
function checkToken($token){
    $str = authcode($token, 'DECODE', KEY);
    $result = json_decode($str);
    if(is_array($result)){
        return $result[2];
    }else{
        return 'decrypt fail';
    }
}
 
 
// 加密/解密方法
function authcode($string, $operation = 'DECODE', $key){
 
    $ckey_length = 4;   // 随机密钥长度 取值 0-32;
 
    $key = md5($key);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
 
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
 
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
 
    $result = '';
    $box = range(0, 255);
 
    $rndkey = array();
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
 
    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
 
    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
 
    if($operation == 'DECODE') {
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc.str_replace('=', '', base64_encode($result));
    }
 
}
*/
?>