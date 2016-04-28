<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	//smarty path settings
	require('smarty/libs/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->template_dir = 'smarty/templates/';
	$smarty->compile_dir = 'smarty/templates_c/';
	$smarty->config_dir = 'smarty/configs/';
	$smarty->cache_dir = 'smarty/cache/';

	//indien er niets is gepost lege velden meesturen; dit laten staan VOOR de isset post
	$smarty->assign('username', "");
	$smarty->assign('password', "");

$notice = "";
		if (isset($_POST['btnLogin'])) {	
			// controle om te zien of alle velden ingevuld zijn
			if (!empty($_POST['username']) && !empty($_POST['password'])) {
								
				//connectie maken met db
				$db = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpassw);

				$username = htmlspecialchars($_POST['username']);
				$password = htmlspecialchars($_POST['password']);

				$sql = "SELECT password FROM users WHERE username = '". $username . "' LIMIT 0, 1";
				$query = $db->prepare($sql);
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_ASSOC);

				if(count($result)>0){
					 $hash = $result[0]['password'];

						if( password_verify($password, $hash)) {
							$_SESSION["userID"] = $person["id"];
							header("Location:feed.php");
						}else {
							$notice['message'] = "combination of username of password is incorrect";
							$notice['color'] = "red";
					}
					}else {
						$notice['message'] = "combination of username and password not found";
						$notice['color'] = 'red';
				}
				}else {
					$notice['message'] = "Make sure all the fields are filled in.";
					$notice['color'] = 'red';
				}
		}
	$smarty->assign('notice', $notice);													
	$smarty->assign('filename', 'login.tpl');
	$smarty->assign('siteurl', siteurl);

	//template weergeven
	$smarty->display('layout.tpl');
?>