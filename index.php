<?php
	session_start();
	
	$url = $_SERVER['HTTP_HOST'].'/php1_eindproject/';
	
	if(isset($_GET['url'])){
		$gurl = $_GET['url'];
	}else{
		$gurl = 'home';
	}
	
	if($gurl == 'login' || $gurl == 'register'){
		openPage($gurl);
	}else{
		if(!isset($_SESSION['login'])){
			openPage($gurl);
		}else{
			header('Location: http://'.$url.'login');
			exit();
		}
	}
	
	function openPage($gurl){
		if($gurl == 'login'){
			include('login.php');
		}elseif($gurl == 'register'){
			include('register.php');
		}elseif($gurl == 'change_profile'){
			include('change_profile.php');
		}
	}
?>