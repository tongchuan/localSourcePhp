<?php
	class echartsController extends baseController{
		
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			echo "string";
			$this->load->model('posts');
			$vars['title'] = 'Dynamic title';
			$vars['posts'] = $this->posts->getEntries();
			$this->load->view('/echarts/index',$vars);	
		}
		
	}
