<?php
	class echartController extends baseController{
		
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			echo 'index';
			exit();
		}
		public function voucherNumber(){
			echo '{"success":true,"message":"","data":{"series":["0",{"value":0,"itemStyle":{"normal":{"color":"#534"}}}],"xAxis":["待审核","待记账"]},"code":1}';
			exit();
		}

		public function financialIndex(){
			echo '{"success":true,"message":"","data":{"series":{"asslib":[0.0,0.0,0.0,100.0,100.0],"grossprofit":[0.0,0.0,0.0,0.0,0.0],"netprofit":[0.0,0.0,0.0,0.0,0.0],"circulratio":[0.0,0.0,0.0,0.0,0.0]},"xAxis":["1月","2月","3月","4月","5月"],"name":["资产负债率","毛利率","净利率","流动比率"]},"code":1}';
			exit();
		}
		public function financialAny()
		{
			echo '{"success":true,"message":"","data":{"topseries":[{"value":11.0,"name":"费用"},{"value":11.0,"name":"资产"},{"value":11.0,"name":"负债"},{"value":0.0,"name":"所有者权益"},{"value":0.0,"name":"收入"},{"value":0.0,"name":"共同"}],"secseries":[{"value":-11.0,"name":"成本"}],"name":["费用","资产","负债","所有者权益","收入","共同","成本"]},"code":1}';
			exit();
		}
		public function state(){
			echo '{"success":true,"message":"","data":{"series":{"income":[0.0,0.0,0.0,0.0,0.0],"cost":[0.0,0.0,0.0,0.0,-11.0],"expense":[0.0,0.0,0.0,0.0,11.0],"profit":[0.0,0.0,0.0,0.0,0.0]},"xAxis":["1月","2月","3月","4月","5月"],"name":["收入","成本","费用","利润"]},"code":1}';
			exit();
		}
	}
