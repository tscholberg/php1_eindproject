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

		if (isset($_POST['btnLogin'])) {
			$error = array();
				
			// controle om te zien of alle velden ingevuld zijn
			if (!empty($_POST['username']) && !empty($_POST['password'])) {
				session_start();
													
			//connectie maken met db
			$db = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpassw);
			
			$password = $_POST['password'];
			$username = $_POST['username'];

			$sql = "SELECT * FROM users WHERE username = '". $username . "'";
			$query = $db->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);

				$person = $result[0];
				$hash = $person['password'];

					if( password_verify($password, $hash)) {
						$_SESSION["userID"] = $person["id"];
						header("Location:feed.php");
					}
					else {
						$p_email = "";
						$p_user = "";
					}
			}
			else {
				echo "Make sure all the fields are filled in.";
			}
		}
															
	$smarty->assign('filename', 'login.tpl');
	$smarty->assign('siteurl', siteurl);

	//template weergeven
	$smarty->display('layout.tpl');
?>