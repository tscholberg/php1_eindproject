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
		
	//database connectie sluiten
	$db = NULL;
	
	$smarty->assign('filename', 'login.tpl');
	$smarty->assign('siteurl', siteurl);

	//template weergeven
	$smarty->display('layout.tpl');
?>