<?php
class Request{
	
	private $_controller;
	private $_method;
	private $_args;
	private $_path;
	public function __construct(){
		$parts = explode('/',$_SERVER['REQUEST_URI']);
		// var_dump($parts);
		$parts = array_filter($parts);
		
		$this->_controller = ($c = array_shift($parts))? $c: 'index';
		if($this->_controller=='yzb'){
			$this->_path=$this->_controller.'/';
			$this->_controller = ($c = array_shift($parts))? $c: 'index';
			$this->_method = ($c = array_shift($parts))? $c: 'index';
			$this->_args = (isset($parts[0])) ? $parts : array();
		}else{
			$this->_path="";
			// $this->_controller = ($c = array_shift($parts))? $c: 'index';
			$this->_method = ($c = array_shift($parts))? $c: 'index';
			$this->_args = (isset($parts[0])) ? $parts : array();
		}
		

		// printf($this->_path);
		// printf($this->_controller);
		// printf($this->_method);
		// var_dump($this->_args);
	}
	public function getPath(){
		return $this->_path;
	}
	public function getController(){
		return $this->_controller;
	}
	public function getMethod(){
		return $this->_method;
	}
	public function getArgs(){
		return $this->_args;
	}
}
?>
<?php
/**
	class Request{
		
		private $_controller;

		private $_method;

		private $_args;

		public function __construct(){
			// var_dump($_SERVER);
			$url = $_SERVER['REQUEST_URI'];
			echo $url;
			$args = explode('?',$url);
			// var_dump($args);
			if(count($args)>1){
				// $this->_args = explode('&',$args[1]);
				$this->_args = array_merge($_GET,$_POST);
			}
			$arr = explode('/',$args[0]);
			var_dump($arr);

			// var_dump(count($arr));
			if(count($arr)<4){
				$this->_controller = 'index';
				$this->_method = 'index';
			}else if(count($arr)<5){
				$c = array_pop($arr);
				$this->_controller = $c ? $c : 'index';
				$this->_method = 'index';
			}else{
				$m = array_pop($arr);
				$c = array_pop($arr);
				$this->_method = $m ? $m : 'index';
				$this->_controller = $c ? $c : 'index';
			}
			var_dump($this);
			// $c = array_pop($arr);
			// var_dump($c);
			// $arr = explode('/',$url);
			// var_dump($arr);
			// exit();
			// if($pos!==false)
		 //    {
		 //      $pos = substr($url,$pos+1);
		 //    }
			// $parts = explode('/',$pos);

			
			// $parts = array_filter($parts);
			// var_dump($parts);
			// $this->_controller = ($c = array_shift($parts))? $c: 'index';
			// $this->_method = ($c = array_shift($parts))? $c: 'index';
			// $this->_args = (isset($parts[0])) ? $parts : array();
		}

		public function getController(){
			// var_dump($this->_controller);
			return $this->_controller;
		}
		public function getMethod(){
			return $this->_method;
		}
		public function getArgs(){
			return $this->_args;
		}
	}
*/
?>