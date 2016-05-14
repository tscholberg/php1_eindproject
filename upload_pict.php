<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;
												
	$t->assign('filename', 'upload_pict.tpl');
	$t->assign('siteurl', siteurl);

	$db = new database;
	//function that returns the image extension
    function getImageType($imagetype)
	{
		if(empty($imagetype))
			return false;
		switch($imagetype)
		{
			case 'image/bmp':
				return '.bmp';
			case 'image/gif':
				return '.gif';
			case 'image/jpeg':
				return '.jpg';
			case 'image/png':
				return '.png';
			default:
				return false;
		}
	}



	//template weergeven
	$t->display('layout.tpl');
?>