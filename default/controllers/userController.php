<?php
class userController extends baseController{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->model('user');
		$curl = new CURL();
		// $result = $curl->initcurl("http://www.two.com:88/user/test",array(),"POST");
		// var_dump(json_decode($result,true));
		// echo json_encode($result);
		// exit();
		$arr=array();
		$this->load->view('user/index',$arr);
	}

	public function login(){
		$this->load->model('user');
		$arr=array();
		$this->load->view('user/login',$arr);
	}

	public function loginSubmit(){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$data=NULL;
		if($username=='zhang' && $password=='123'){
			$token = TOKEN::genToken($username.$password);
			setcookie("username", $username, time()+3600);
			setcookie("password", $password, time()+3600);
			setcookie("token", $token, time()+3600);
			$curl = new CURL();
			$param = array("username"=>$username,"password"=>$password,"token"=>$token);
			// $result = $curl->initcurl("http://www.two.com:88/user/checkToken",$param,"POST");
			$result = $curl->initcurl("http://www.one.com:88/user/checkToken",$param,"POST");
			$data['curl']=json_encode($result);
			$data['code']=10000;
			$data['msg']="";
		}else{
			$data['code']=10001;
			$data['msg']="用户名密码错误";
		}
		echo json_encode($data);
		exit();
	}

	public function logout(){
		setcookie("username", "", time()-3600);
		setcookie("password", "", time()-3600);
		setcookie("token", "", time()-3600);
		$data=NULL;
		$data['code']=10000;
		$data['msg']="";
		echo json_encode($data);
		exit();
	}

	public function checkToken(){
		$data = NULL;
		$data['msg']="";
		$param = file_get_contents('php://input');
		$param = json_decode($param,true);
		if(count($_POST)!=0){
			$data['username']=$_POST['username'];
			$data['password']=$_POST['password'];
			$data['token']=$_POST['token'];
		}else if($param!=NULL){
			$data['username']=$param['username'];
			$data['password']=$param['password'];
			$data['token']=$param['token'];
		}

		$token = TOKEN::checkToken($data['token']);
		$result=NULL;
		if($token==$data['username'].$data['password']){
			setcookie("username", $data['username'], time()+3600);
			setcookie("password", $data['password'], time()+3600);
			setcookie("token", $data['token'], time()+3600);
			$result["code"]=10000;
			$result['msg']="";
		}else{
			$result["code"]=10001;
			$result['msg']="认证失败";
		}
		echo json_encode($result);
		exit();
		/*
		$d = NULL;
		$d = array('username' => 'zhang','password'=> '123','token'=>'333333333');
		$curl = new CURL();
		// $r = $curl->initcurl("http://www.two.com:88/user/test",$d,"POST");
		$r = $curl->initcurl("http://www.two.com:88/user/test",$d);
		echo json_encode($r);
		exit();
		*/

		/*$username=$_POST['username'];
		$password=$_POST['password'];
		$token=$_POST['token'];
		$token = TOKEN::checkToken($token);
		$data = NULL;
		if($token==$username.$password){
			setcookie("username", $username, time()+3600);
			setcookie("password", $password, time()+3600);
			setcookie("token", $token, time()+3600);
			$data["code"]=10000;
			$data['msg']="";
		}else{
			$data["code"]=10001;
			$data['msg']="认证失败";
		}
		echo json_encode($_POST);
		exit();
		*/
	}

	public function test(){
		$data = NULL;
		$data['msg']="";
		$param = file_get_contents('php://input');
		$param = json_decode($param,true);
		var_dump($param);
		exit();
		if(count($_POST)!=0){
			$data['username']=$_POST['username'];
			$data['password']=$_POST['password'];
			$data['token']=$_POST['token'];
		}else if($param!=NULL){
			$data['username']=$param['username'];
			$data['password']=$param['password'];
			$data['token']=$param['token'];
		}

		$token = TOKEN::checkToken($data['token']);
		if($token==$data['username'].$data['password']){
			setcookie("username", $username, time()+3600);
			setcookie("password", $password, time()+3600);
			setcookie("token", $token, time()+3600);
			$data["code"]=10000;
			$data['msg']="";
		}else{
			$data["code"]=10001;
			$data['msg']="认证失败";
		}
		echo json_encode($_POST);
		exit();
		// echo $param;
		// var_dump(json_decode($param,true)['username']);
		// echo json_encode($_FILES);
		// echo json_encode($_GET);
		// echo json_encode($_POST);
		// exit();
		// $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
		// $txt = "Mickey Mouse\n\t";
		// fwrite($myfile, $txt);
		// $txt = "Minnie Mouse\n\t";
		// fwrite($myfile, $txt);
		// fclose($myfile);
		// echo json_encode($_POST);
	}
	public function checkTokens(){


		// data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOQAAABOCAYAAAAw0LoFAAAgAElEQVR4nOy9B5xk510leqpu5Zyrc5zunu6e
		$token = $_GET['token'];
		$username = $_GET['username'];
		$token = TOKEN::checkToken($token);
		$data = NULL;
		if($token==$username){
			setcookie("username", $username, time()+3600);
			// setcookie("password", $password, time()+3600);
			setcookie("token", $token, time()+3600);
			$data["code"]=10000;
			$data['msg']="";
		}else{
			$data["code"]=10001;
			$data['msg']="认证失败";
		}
		echo json_encode($data);
		exit();
	}

	public function upimage(){
		define('UPLOAD_DIR', './images/');
		$imgages = $_POST['images'];

		foreach($imgages as $img){

			$start = strpos($img,',');
			$info = substr($img,0,$start+1);
			// data:image/png;base64
			$info = substr($info, 0, count($info)-9);
			$infoStart = strpos($info,'/');
			// echo "$info";
			$suffix = substr($info,$infoStart+1);
			$img= substr($img,$start+1);
			// $img = str_replace(' ','+', $img);
			$data = base64_decode($img);
			$fileName = UPLOAD_DIR . uniqid() . '.'.$suffix;//'.png';
			$success = file_put_contents($fileName, $data);
		}

		$data=array();
		if($success){
		  $data['status']=1;
		  $data['msg']='上传成功';
		  echo json_encode($data);
		}else{
		  $data['status']=0;
		  $data['msg']='系统繁忙，请售后再试';
		  echo json_encode($data);
		}
		exit();
	}

	public function upi(){
		define('UPLOAD_DIR', './images/');
		$FileID=date("Ymd-His") . '-' . rand(100,999);
		$FileName = $FileID.$_FILES["file"]["name"];
		// echo json_encode($_FILES['file']);
		move_uploaded_file($_FILES["file"]["tmp_name"],UPLOAD_DIR.$FileName);
		echo '{"image": "'.$FileName.'"}';
		exit();
		$file = $_FILES['file'];//得到传输的数据
		//得到文件名称
		$name = $file['name'];
		$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
		$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
		//判断文件类型是否被允许上传
		if(!in_array($type, $allow_type)){
		  //如果不被允许，则直接停止程序运行
		  return ;
		}
		//判断是否是通过HTTP POST上传的
		if(!is_uploaded_file($file['tmp_name'])){
		  //如果不是通过HTTP POST上传的
		  return ;
		}
		$upload_path = "D:/now/"; //上传文件的存放路径
		//开始移动文件到相应的文件夹
		if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
		  echo "Successfully!";
		}else{
		  echo "Failed!";
		}
		echo '{"image": "http://baidu.com/2.png"}';
		exit();
	}
}

?>