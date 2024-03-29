<?php
	require_once("includes/global.inc.php");
	
	session_start();
	
	$url = siteurl;
	
	if(isset($_GET['url'])){
		$gurl = $_GET['url'];
	}else{
		$gurl = 'feed';
	}
	
	if($gurl == 'login' || $gurl == 'logout' || $gurl == 'register'){
		openPage($gurl);
	}else{
		if(isset($_SESSION['login'])){
			openPage($gurl);
		}else{
			header('Location: '.siteurl.'/login');
			exit();
		}
	}
	
	function openPage($gurl){
		if($gurl == 'login'){
			include('login.php');
		}elseif($gurl == 'logout'){
			include('logout.php');
		}elseif($gurl == 'register'){
			include('register.php');
		}elseif($gurl == 'change_profile'){
			include('change_profile.php');
		}elseif($gurl == 'feed') {
			include('feed.php');
		}elseif($gurl == 'upload') {
			include('upload_pict.php');
		}else{
			include('404.php');
		}
	}
?>