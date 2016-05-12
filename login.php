<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;

	//indien er niets is gepost lege velden meesturen; dit laten staan VOOR de isset post
	$t->assign('username', "");
	$t->assign('password', "");

	$notice = "";
	if (isset($_POST['btnLogin'])) {	
		// controle om te zien of alle velden ingevuld zijn
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$db = new database;

			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);

			$sql = "SELECT password FROM users WHERE username = '". $username . "' LIMIT 0, 1";
			$query = $db->run($sql);
			$result = $db->fetch();
			$db->close();

			if(count($result)>0){
				 $hash = $result[0]['password'];

				if( password_verify($password, $hash)) {
					$_SESSION["userID"] = $username;
					header("Location:feed.php");
				}else{
					$notice['message'] = "combination of username of password is incorrect";
					$notice['color'] = "red";
				}
			}else{
				$notice['message'] = "combination of username and password not found";
				$notice['color'] = 'red';
			}
		}else{
			$notice['message'] = "Make sure all the fields are filled in.";
			$notice['color'] = 'red';
		}
	}
	$t->assign('notice', $notice);													
	$t->assign('filename', 'login.tpl');
	$t->assign('siteurl', siteurl);

	//template weergeven
	$t->display('layout.tpl');
?>