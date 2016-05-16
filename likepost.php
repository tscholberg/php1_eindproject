<?php
	session_start();
	
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");


	$userName = $_SESSION['login'];
	$postID = htmlspecialchars($_POST['postid']);

	//get userID
	$db = new database;
	$sql = "SELECT  userID
			FROM 	users
			WHERE 	username = '".$userName."'";
	$query = $db->run($sql);
	$result = $db->fetch();
	$db->close();

	$userID = $result[0]['userID'];

	//check if photo is already liked
	$db = new database;
	$sql = "SELECT  userID, postID
			FROM 	likes
			WHERE 	userID = '".$userID."'";
	$query = $db->run($sql);
	$result = $db->fetch();
	$db->close();
	
	if(count($result) == 0){
		//post nog niet geliked; insert
		$db = new database;
		$sql = "INSERT INTO likes (userID, postID)
				VALUES ('".$userID."','".$postID."')";
		$result = $db->run($sql);
		$db->close();
		
		if($result){
			echo "like";
		}else{
			echo "error";
		}
	}else{
		//post nog niet geliked; insert
		$db = new database;
		$sql = "DELETE FROM likes
				WHERE userID = '".$userID."'
				AND postID = '".$postID."'";
		$result = $db->run($sql);
		$db->close();
		
		if($result){
			echo "nolike";
		}else{
			echo "error";
		}
	}
?>