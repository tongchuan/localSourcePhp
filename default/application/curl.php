<?php
class CURL{
	private $type;
	private $data;
	private $url;
	private $curl;
	public function __construct(){
		/*$this->type = $type;
		$this->data = json_encode($data);
		// $this->data = $data;
		$this->url = $url;
		$this->curl= curl_init($this->url);
		// var_dump($this->url);
		curl_setopt($this->curl, CURLOPT_MAXREDIRS, 5); 
		curl_setopt($this->curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);    // 强制使用 HTTP/1.0
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 30);    // 发起连接前等待超时的时间，如果设置为0，则无限等待 
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 30);    // 设置curl允许执行的最长秒数
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_ENCODING, 'gzip');    // 设置HTTP请求头中"Accept-Encoding: "的值
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, false);    // 启用时会将服务器返回的"Location: "放在header中递归的返回给服务器
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);    // 是否需要进行服务端的SSL证书验证
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);    // 是否验证服务器SSL证书中的公用名
		curl_setopt($this->curl, CURLOPT_HEADER, false);	 // 是否抓取头文件的信息
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
		switch ($this->type) {
			case "GET" : 
				curl_setopt($this->curl, CURLOPT_HTTPGET, true);
				break;
			case "POST": 
				
				curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
				// curl_setopt($this->curl, CURLOPT_POST,true);
				curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length:'.strlen($this->data)));
				// curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length:'.strlen(json_encode($this->data))));
				break; 
			case "PUT": 
				curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				break;
			case "DELETE":
				curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				break;
			default:
			
				break;
		}
		$result = curl_exec($this->curl);
		curl_close($this->curl);
		return $result;
		*/
		
	}

	public function initcurl($url,$data=NULL,$type='POST'){
		$this->type = $type;
		// $this->data = json_encode($data);
		$this->data = $data;
		$this->url = $url;
		$this->curl= curl_init($this->url);
		// var_dump($this->url);
		curl_setopt($this->curl, CURLOPT_MAXREDIRS, 5); 
		curl_setopt($this->curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);    // 强制使用 HTTP/1.0
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 0);    // 发起连接前等待超时的时间，如果设置为0，则无限等待 
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 30);    // 设置curl允许执行的最长秒数
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_ENCODING, 'gzip');    // 设置HTTP请求头中"Accept-Encoding: "的值
		curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, false);    // 启用时会将服务器返回的"Location: "放在header中递归的返回给服务器
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);    // 是否需要进行服务端的SSL证书验证
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);    // 是否验证服务器SSL证书中的公用名
		curl_setopt($this->curl, CURLOPT_HEADER, false);	 // 是否抓取头文件的信息
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
		switch ($this->type) {
			case "GET" : 
				curl_setopt($this->curl, CURLOPT_HTTPGET, true);
				break;
			case "POST": 
				
				curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($this->curl, CURLOPT_POST,true);
				// curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				// curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded;charset=utf-8'));
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,json_encode($this->data));
				curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length:'.strlen(json_encode($this->data))));
				break; 
			case "PUT": 
				curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				break;
			case "DELETE":
				curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($this->curl, CURLOPT_POSTFIELDS,$this->data);
				break;
			default:
			
				break;
		}
		$result = curl_exec($this->curl);
		curl_close($this->curl);
		return $result;
	}

	public function Post($url,$data){
		$ch = curl_init($url);
		$data_string = json_encode($data);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);
		 
		$result = curl_exec($ch);
		return $result;
	}
}
?>