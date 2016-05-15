<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;

	$t->assign('filename', 'upload_pict.tpl');
	$t->assign('siteurl', siteurl);

	//indien er niets is gepost lege velden meesturen; dit laten staan VOOR de isset post
	$t->assign('imageUpload', "");
	$t->assign('description', "");

	//set path where uploaded img will be stored
	$targetpath = 'images/' ;
	//array for valid file types
	$validtype = array("image/jpg", "image/jpeg", "image/bmp", "image/gif", "image/png");

	//db connection for userID, username current session
	$db2= new database();
	$sql2= "SELECT userID,username FROM users WHERE username = '".$_SESSION['login']."'";
	$db2->run($sql2);
	$result2 = $db2->fetch();
	$db2->close();
	$p_userID = $result2[0]['userID'];
	$p_username = $result2[0]['username'];

	//function to store img in db with new name
	if(isset($_POST['btnUploadPic'])) {
		//function that returns the image extension
		function getImageExtension($imgtype)
		{
			if (empty($imgtype))
				return false;
			switch ($imgtype) {
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
		if (!empty($_POST['description']) && !empty($_FILES["imageUpload"]["name"])) {
			if (in_array($_FILES['imageUpload']['type'], $validtype)) {
				$p_description = htmlspecialchars($_POST['description']);
				$p_filename = $_FILES["imageUpload"]["name"];
				$p_tmpname = $_FILES["imageUpload"]["tmp_name"];
				$p_imgtype = $_FILES["imageUpload"]["type"];
				$p_imgsize = $_FILES["imageUpload"]["size"];
				$ext = getImageExtension($p_imgtype);
				$p_imgname = $p_userID . "-" . date("UdmY") . strtolower($ext); //string to lowercase: sometimes extensions are in uppercase
				$targetpath = 'images/' . $p_imgname;

				//write post in db
				//move_uploaded_file() a php inbuilt function to upload img or file to db. Required: file name and target source destination
				if (move_uploaded_file($p_tmpname, $targetpath)) {
					$db = new database;
					$sql = "INSERT INTO posts ( userID,
											description,
											picture,
											uploaddate,
											createdon,
											createdby,
											lastupdatedon,
											lastupdatedby
									   )
									 VALUES ( '" . $p_userID . "',
									 		  '" . $p_description . "',
											  '" . $targetpath . "',
											  NOW(),
											  NOW(),
											  '" . $p_username . "',
											  NOW(),
											  '" . $p_username . "'
											);
				";
					$db->run($sql);
					$result = $db->fetch();
					$db->close();
				}
			} else {
				echo "Make sure you upload an image";
			}
		}else {
			echo "not all fields are filled in";
		}
	} else {
			echo "error while uploading image on server";
	}
	//template weergeven
	$t->display('layout.tpl');
?>