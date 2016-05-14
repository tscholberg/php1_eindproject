<?php
	include("includes/db.inc.php");

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
	if(!isset($_POST['btnUploadPic'])) {

		if(!empty($_POST['description'])){
			$p_description = htmlspecialchars($_POST['description']);
		}else{
			echo "description cannot be empty";
		}
		if (!empty($_FILES["uploadedimg"]["name"])) {
			$filename = $_FILES["uploadedimg"]["name"];
			$tmpname = $_FILES["uploadedimg"]["tmpname"];
			$imgtype = $_FILES["uploadedimg"]["type"];
			$ext = getImageType($imgtype);
			$imgname = date("d-m-Y") . "-" . time() . $ext;
			$targetpath = "images/" . $imgname;

			//write post in db
			//move_uploaded_file() a php inbuilt function to upload img or file to db. Required: file name and target source destination
			if (move_uploaded_file($temp_name, $targetpath)) {
				$db = new database;
				$sql = "INSERT into posts ( USERID,
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
				echo "error while uploading image on server";
			}
		}
	}
	//template weergeven
	$t->display('layout.tpl');
?>