<?php
	include("includes/db.inc.php");

	$t = new templateparser;

	$t->assign('filename', 'upload_pict.tpl');
	$t->assign('siteurl', siteurl);

	//indien er niets is gepost lege velden meesturen; dit laten staan VOOR de isset post
	$t->assign('imageUpload', "");
	$t->assign('description', "");

	//function to store img in db with new name
	if(!isset($_POST['btnUploadPic'])) {
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
			$p_description = htmlspecialchars($_POST['description']);
			$p_filename = $_FILES["imageUpload"]["name"];
			$p_tmpname = $_FILES["imageUpload"]["tmpname"];
			$p_imgtype = $_FILES["imageUpload"]["type"];
			$ext = getImageExtension($imgtype);
			$p_imgname = date("d-m-Y")."-".time().$ext;
			$targetpath = "images/" . $p_imgname;

			//write post in db
			//move_uploaded_file() a php inbuilt function to upload img or file to db. Required: file name and target source destination
			if (move_uploaded_file($p_tmpname, $targetpath)) {

				$db = new database;
				$sql = "INSERT INTO posts ( description,
											picture,
											uploaddate
									   )
									 VALUES ( '" . $p_description . "',
											  '" . $targetpath . "',
											  NOW()
											);
				";
				$query = $db->run($sql);
				$result = $query->fetch();
				$db->close();
			} else {
				echo "error while uploading image on server";
			}
		} else {
			echo "Not all fields were filled in";
		}
	}
	//array weergeven
	print_r($_FILES);
	//template weergeven
	$t->display('layout.tpl');
?>