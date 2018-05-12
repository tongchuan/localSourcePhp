<?php
	class orgController extends baseController{
		
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			echo 'index';
			exit();
		}
		public function getcurrentorg(){
			echo '{"success":true,"message":"","data":{"id":"G001ZM0000BASEDOCDEFAULTORG000000000","creator":null,"creationtime":"2017-02-23 09:37:15","modifier":null,"modifiedtime":"2017-02-23 09:37:15","pk_org":{"id":"G001ZM0000BASEDOCDEFAULTORG000000000","code":"0001","name":"测试科技股份有限公司"},"pk_group":null,"description":"","ts":"2017-02-23 09:37:15","dr":0,"code":"0001","name":"测试科技股份有限公司","name2":null,"name3":null,"name4":null,"name5":null,"name6":null,"parentid":null,"classifyid":null,"enable":true,"def1":null,"def2":null,"def3":null,"def4":null,"def5":null,"def6":null,"def7":null,"def8":null,"def9":null,"def10":null,"def11":null,"def12":null,"def13":null,"def14":null,"def15":null,"def16":null,"def17":null,"def18":null,"def19":null,"def20":null,"def21":null,"def22":null,"def23":null,"def24":null,"def25":null,"def26":null,"def27":null,"def28":null,"def29":null,"def30":null},"code":1}';
			exit();
		}

	}
