<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;
												
	$t->assign('filename', 'upload_pict.tpl');
	$t->assign('siteurl', siteurl);

	//function that returns the image extension
    function getImageType($imgtype)
	{
		if(empty($imgtype))
			return false;
		switch($imgtype)
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
	//function to store img in db with new name
	if(!empty($_FILES["uploadedimg"]["name"])) {
		$filename = $_FILES["uploadedimg"]["name"];
		$tmpname = $_FILES["uploadedimg"]["tmpname"];
		$imgtype = $_FILES["uploadedimg"]["type"];
		$ext = getImageType($imgtype);
		$imagename = date("d-m-Y") . "-" . time() . $ext;
		$targetpath = "images/" . $imagename;

		//write post in db
		//move_uploaded_file() a php inbuilt function to upload img or file to db. Required: file name and target source destination
		if (move_uploaded_file($temp_name, $targetpath)) {
			$db = new database;
			$sql = "INSERT into POSTS ( USERID,
										DESCRIPTION,
										PICTURE,
										UPLOADDATE,
										CREATEDON,
										CREATEDBY,
										LASTUPDATEON,
										LASTUPDATEBY
 								   )
							     VALUES ( '" . $p_description . "',
									   	  '" . $targetpath . "',
									      '" . date("Y-m-d") . "'
									    );
			";
			$query = $db->run($sql);
			$status = $query->fetch();
			$db->close();
		} else {
			exit("error while uploading image on server");
		}
	}
	//template weergeven
	$t->display('layout.tpl');
?>