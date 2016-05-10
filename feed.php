<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	//smarty path settings
	require('smarty/libs/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->template_dir = 'smarty/templates/';
	$smarty->compile_dir = 'smarty/templates_c/';
	$smarty->config_dir = 'smarty/configs/';
	$smarty->cache_dir = 'smarty/cache/';
	
	$smarty->assign('filename', 'feed.tpl');
	$smarty->assign('siteurl', siteurl);


	//connectie opbouwen met de database; in select nooit array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'") als vierde argument meegeven
	$db = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpassw);

	//producten ophalen
	$sql = "SELECT  picture
			FROM 	posts";
	
	$query = $db->prepare($sql);
	$query->execute();
	/*\PDO::FETCH_ASSOC and \PDO::FETCH_NUM allow you to define fetching mode. \PDO::FETCH_ASSOC will return only field => value array, whilst \PDO::FETCH_NUM return array with numerical keys only and \PDO::FETCH_BOTH will return result like in the answer. */
	//indien je niets meegeeft is het automatisch fetch_both
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	$afb = $result;
	
	$smarty->assign('afb', $afb);

	//template weergeven
	$smarty->display('layout.tpl');

?>