<?php
class curlController extends baseController{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->model('curl');
		$arr['title'] = 'PHP CURL';
		$arr['list'] = $this->curl->getList();
		$this->load->view('curl/index',$arr);
	}
	// 获取cURL版本数组
	public function version(){
		$version = curl_version();
		var_dump($version);
		exit();
	}
	// 初始化一个新的会话，返回一个cURL句柄，供curl_setopt(), curl_exec()和curl_close() 函数使用。
	public function initsss(){
		// 创建一个新cURL资源
		$ch = curl_init();
		// // 设置URL和相应的选项
		$url = "http://www.two.com:88/curl/fs";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5); 
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);    // 强制使用 HTTP/1.0
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);    // 发起连接前等待超时的时间，如果设置为0，则无限等待 
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);    // 设置curl允许执行的最长秒数
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip');    // 设置HTTP请求头中"Accept-Encoding: "的值
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);    // 启用时会将服务器返回的"Location: "放在header中递归的返回给服务器
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    // 是否需要进行服务端的SSL证书验证
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);    // 是否验证服务器SSL证书中的公用名
		curl_setopt($ch, CURLOPT_HEADER, false);    // 是否抓取头文件的信息
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);        // 设置HTTP请求头
		// curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		// curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
		// curl_setopt($ch, CURLOPT_HTTPGET, true);

		// case "GET" : curl_setopt($ch, CURLOPT_HTTPGET, true);break;  
  //           case "POST": curl_setopt($ch, CURLOPT_POST,true);  
  //               curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);break;  
  //           case "PUT" : curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");  
  //               curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);break;  
  //           case "DELETE":curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");  
  //               curl_setopt($ch, CURLOPT_POSTFIELDS,$querystring);break;  
                
		$post_data = array("username" => "bob","key" => "1222222345");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		// curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_setopt($ch, CURLOPT_URL, "http://www.two.com:88/curl/fs");
		// curl_setopt($ch, CURLOPT_URL, "http://www.two.com:88/curl/fs");
		// curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com");
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
		$data = curl_exec($ch);
		curl_close($ch);
		echo "=========";
		var_dump($data);
		echo "=========";
		$data = json_decode($data,true);
		var_dump($data['username']);
		echo "---------";
	 exit();
		// // 关闭cURL资源，并且释放系统资源
		// curl_close($ch);
		// echo "string";
		// $url =  "http://www.two.com:88/curl/fs";
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $url);
		// // 不需要页面内容
		// curl_setopt($ch, CURLOPT_NOBODY, 1);
		// curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		// // 不直接输出
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// // 返回最后的Location
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// curl_exec($ch);
		// $info = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
		// curl_close($ch);
		// echo '真实url为：'.$info;
		exit();
	}

	public function fs(){
		// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		// $txt = "Bill Gates\n";
		// fwrite($myfile, $txt);
		// $txt = "Steve Jobs\n";
		// fwrite($myfile, $txt);
		// fclose($myfile);
		// $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
		// $txt = "Mickey Mouse\n\t";
		// fwrite($myfile, $txt);
		// $txt = "Minnie Mouse\n\t";
		// fwrite($myfile, $txt);
		// fclose($myfile);
		// echo "{\"name\":\"fadfasd\"}";
		// exit();
		// echo "string";
		// var_dump($_POST);
		// exit();
		echo json_encode($_POST);
		exit();
	}



	public function token(){
		$to = TOKEN::genToken('1234');
		echo $to;
		echo "<br />";
		$s = TOKEN::checkToken($to);
		echo $s;
		echo TOKEN::checkToken("7880Yj+59GfaKZ1JXGLbggUKpiExs07TYFPRJCkGcSpcahysPpNiCLmEUzB1pc0DQ5AUjkw");
		exit();
	}
}
?>



<?php
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