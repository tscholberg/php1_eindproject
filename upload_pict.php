<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;
												
	$t->assign('filename', 'upload_pict.tpl');
	$t->assign('siteurl', siteurl);

	//template weergeven
	$t->display('layout.tpl');
?>