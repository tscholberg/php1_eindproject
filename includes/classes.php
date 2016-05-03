<?php
	$conn = NULL;
	$query = NULL;

	class database{
		public function connect($type){
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
?>