<?php
	class loginController extends baseController{
		
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			echo 'index';
			exit();
		}
		public function status(){
			echo '{"success":true}';
			exit();
		}

	}
