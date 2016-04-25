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

	//template weergeven
	$smarty->display('layout.tpl');

?>