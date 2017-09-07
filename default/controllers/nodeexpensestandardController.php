<?php
class nodeexpensestandardController extends baseController{
	public function __construct(){
		parent::__construct();
	}
	public function randpw($len=8,$format='ALL'){
		$is_abc = $is_numer = 0;
		$password = $tmp =''; 
		switch($format){
			case 'ALL':
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				break;
			case 'CHAR':
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				break;
			case 'NUMBER':
				$chars='0123456789';
				break;
			default :
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				break;
			}
			mt_srand((double)microtime()*1000000*getmypid());
			while(strlen($password)<$len){
				$tmp =substr($chars,(mt_rand()%strlen($chars)),1);
				if(($is_numer <> 1 && is_numeric($tmp) && $tmp > 0 )|| $format == 'CHAR'){
					$is_numer = 1;
				}
				if(($is_abc <> 1 && preg_match('/[a-zA-Z]/',$tmp)) || $format == 'NUMBER'){
					$is_abc = 1;
				}
				$password.= $tmp;
			}
			// if($is_numer <> 1 || $is_abc <> 1 || empty($password) ){
			// 	$password = randpw($len,$format);
			// }
			return $password;
		}

	public function json(){
		$data = null;
		$dataList = array();
		for ($i=0; $i < 10; $i++) { 
			$item = null;
			$item['name'] = "0$i".rand();
			$item['id'] = $this->randpw(20);
			$dataList[] = $item;
		}
		$data['code'] = 0;
		$data['data'] = $dataList;
		$data['success'] = true;
		echo json_encode($data);
		exit();
		echo '{"code":"1","data":[{"name":"002","id":"djSCW10aLPRcFH7LfWhE7"},{"name":"001","id":"pvSC3D9qgxr4wjO7gZQIk"},{"name":"2","id":"r0SCbHUxkvFs0rVQFWJcK"},{"name":"test","id":"RxSCkuKaalkG5FPMJIje8"},{"name":"1","id":"WgSCLjQXFH7aJpbJBJwg7"},{"name":"职务01","id":"wpSCdUZkayiMbwwmAgQbj"}],"success":true}';
		exit();
	}
	public function index(){
		
	}
	public function systemIsNc(){
		echo '{"code":1}';
		exit();
	}
	public function querystandarddata(){
		echo '{"data":[{"code":null,"ranks":[{"name":"2A","pk":"DlSCqlsPzHVqY5KLyzpKt"}],"name":"123","policyexpensetype":{"code":"airplane","name":"机票"},"seattypes":[{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"id":"KASCTwyNWQ3iCmrPKPO4m","relationuserflag":"N","posts":[{"name":"总裁","pk":"PVSCbdF1LzsffH0B5bIAJ"}],"depts":[{"name":"总裁办","pk":"07CCB953-3F4F-4C33-9879-4E70C53A2F59"}]},{"code":null,"name":"修改后test2","policyexpensetype":{"code":"airplane","name":"机票"},"seattypes":[{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"id":"onSCJPfycTRDfrzghFDVh","relationuserflag":"N","depts":[{"name":"财务室","pk":"7041B99B-04C0-433F-B92F-575D816EC6A0"}]},{"code":null,"name":"修改后test4","policyexpensetype":{"code":"airplane","name":"机票"},"seattypes":[{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"id":"PFSC58bQpWzcNt6ZIxruC","relationuserflag":"N","depts":[{"name":"财务室","pk":"7041B99B-04C0-433F-B92F-575D816EC6A0"}]},{"code":null,"name":"修改后test1","policyexpensetype":{"code":"airplane","name":"机票"},"seattypes":[{"code":"plane_02, plane_03","name":"plane_02, plane_03"}],"id":"VoSCoifJe4dBnub0Q4l3w","relationuserflag":"N","depts":[{"name":"财务室","pk":"7041B99B-04C0-433F-B92F-575D816EC6A0"}]},{"code":null,"name":"231","policyexpensetype":{"code":"airplane","name":"机票"},"seattypes":[{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"id":"xUSCQ3wmM3s4rV17o8BFa","relationuserflag":"N","depts":[{"name":"总裁办","pk":"07CCB953-3F4F-4C33-9879-4E70C53A2F59"}]}],"totalnum":5,"success":"true","page":1,"message":"查询完毕。","pagenum":10}';
		exit();
		echo '{"success":true,"message":"","data":[{"id":"01","code":"0001","name":"理报销标准1","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"djSCW10aLPRcFH7LfWhE7","name":"002"},{"pk":"pvSC3D9qgxr4wjO7gZQIk","name":"001"}],"ranks":[{"pk":"RxSCkuKaalkG5FPMJIje8","name":"test"}]},{"id":"02","code":"0002","name":"经理报销标准2","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"03","code":"0003","name":"经理报销标准3","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"04","code":"0004","name":"经理报销标准4","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"05","code":"0005","name":"经理报销标准5","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"06","code":"0006","name":"经理报销标准6","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"07","code":"0007","name":"经理报销标准7","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"08","code":"0008","name":"经理报销标准8","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"09","code":"0009","name":"经理报销标准9","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"10","code":"0010","name":"经理报销标准10","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"plantseattype":[{"code":"plane_01","name":"头等舱"},{"code":"plane_02","name":"商务舱"},{"code":"plane_03","name":"经济舱"}],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]}],"pagenum":10,"page":1,"totalnum":100}';
		exit();
	}

	public function deletestandarddata(){
		echo '{"success":true,"message":""}';
		exit();
	}

	public function savestandarddata(){
		echo '{"success":false,"message":"","data":[{"id":"01","code":"0001","name":"理报销标准1","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"02","code":"0002","name":"经理报销标准2","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"03","code":"0003","name":"经理报销标准3","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"04","code":"0004","name":"经理报销标准4","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"05","code":"0005","name":"经理报销标准5","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"06","code":"0006","name":"经理报销标准6","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"07","code":"0007","name":"经理报销标准7","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"08","code":"0008","name":"经理报销标准8","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"09","code":"0009","name":"经理报销标准9","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"10","code":"0010","name":"经理报销标准10","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]}],"pagenum":10,"page":1,"totalnum":100}';
		exit();
	}
	
	public function updatestandarddata(){
		echo '{"success":true,"message":"","data":[{"id":"01","code":"0001","name":"理报销标准1","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"02","code":"0002","name":"经理报销标准2","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"03","code":"0003","name":"经理报销标准3","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"04","code":"0004","name":"经理报销标准4","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"05","code":"0005","name":"经理报销标准5","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"06","code":"0006","name":"经理报销标准6","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"07","code":"0007","name":"经理报销标准7","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"08","code":"0008","name":"经理报销标准8","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"09","code":"0009","name":"经理报销标准9","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]},{"id":"10","code":"0010","name":"经理报销标准10","policyexpensetype":"policyexpensetype_airplane","policyexpensetypename":"机票","seattype":["train_01","train_02"],"seattypename":["经济舱","商务舱","不限仓位"],"posts":[{"pk":"0001","name":"总经理"},{"pk":"0002","name":"室长"},{"pk":"0002","name":"打酱油的"}],"ranks":[{"pk":"1001","name":"P10"},{"pk":"1002","name":"P9"},{"pk":"1003","name":"P8"}]}],"pagenum":10,"page":1,"totalnum":100}';
		exit();
	}

	public function GetList(){
		echo '{"success":true,"data":[],"message":""}';
		exit();
	}
	public function filternodeexpensestandarduser(){
		$data = array();
		for ($i=0; $i < 20; $i++) { 
			$item = null;
			$item['userid'] = $i;
			$item['userName'] = 'username'.$i;
			$item['password'] = '1';
			$item['description'] = '1';
			$item['birthday'] = date("Y-m-d H:i:s");
			$data[]=$item;
		}
		$s = null;
		$s['users'] = $data;
		echo json_encode($s);
		exit();
	}
}
?>