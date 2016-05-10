<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;
		
	$t->assign('filename', 'change_profile.tpl');
	$t->assign('siteurl', siteurl);

	//template weergeven
	$t->display('layout.tpl');
?>