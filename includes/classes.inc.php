<?php
	$conn = NULL;
	$query = NULL;

	class database{
		public function __construct(){
			$this->conn = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpassw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'") );
		}
		public function run($sql){
			$this->query = $this->conn->prepare($sql);
			$this->query->execute();
		}
		public function fetch(){
			return $this->query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function close(){
			$this->conn = NULL;
			$this->query = NULL;
		}		
	}

	
	
	$smarty = NULL;
	
	class templateparser{
		public function __construct(){
			//smarty path settings
			require("smarty/libs/Smarty.class.php");
			$this->smarty = new Smarty;
			$this->smarty->template_dir = "smarty/templates/";
			$this->smarty->compile_dir = "smarty/templates_c/";
			$this->smarty->config_dir = "smarty/configs/";
			$this->smarty->cache_dir = "smarty/cache/";
		}
		public function assign($var, $value){
			$this->smarty->assign($var, $value);
		}
		public function display($template){
			$this->smarty->display($template);
			$this->smarty = NULL;
		}
	}
?>