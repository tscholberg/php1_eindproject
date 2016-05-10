<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;
	
	$t->assign('filename', 'feed.tpl');
	$t->assign('siteurl', siteurl);

	$db = new database;

	//producten ophalen
	$sql = "SELECT  picture
			FROM 	posts";
	
	$query = $db->run($sql);
	$result = $db->fetch();
	$afb = $result;
	$db->close();

	$t->assign('afb', $afb);

	//template weergeven
	$t->display('layout.tpl');
?>