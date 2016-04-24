<?php
	include("includes/db.inc.php");

	//smarty path settings
	require('smarty/libs/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->template_dir = 'smarty/templates/';
	$smarty->compile_dir = 'smarty/templates_c/';
	$smarty->config_dir = 'smarty/configs/';
	$smarty->cache_dir = 'smarty/cache/';
	
	//indien er niets is gepost lege velden meesturen; dit laten staan VOOR de isset post
	$smarty->assign('firstname', "");
	$smarty->assign('lastname', "");
	$smarty->assign('birthday', "");
	$smarty->assign('email', "");
	$smarty->assign('username', "");

	if(isset($_POST['btnRegister'])){
		$error = array();
		
		/* controle om te kijken als alle velden zijn ingevuld en geposte gegevens verwerken */
		if(!empty($_POST['firstname'])){
			$p_firstname = htmlspecialchars($_POST['firstname']);
		}else{
			$p_firstname = "";
			$error[] = "firstname";
		}

		if(!empty($_POST['lastname'])){
			$p_lastname = htmlspecialchars($_POST['lastname']);
		}else{
			$p_lastname = "";
			$error[] = "lastname";
		}

		if(!empty($_POST['gender'])){
			$p_gender = htmlspecialchars($_POST['gender']);
		}else{
			$p_gender = "";
			$error[] = "gender";
		}

		if(!empty($_POST['birthday'])){
			$p_birthday = htmlspecialchars($_POST['birthday']);
		}else{
			$p_birthday = "";
			$error[] = "birthday";
		}

		if(!empty($_POST['languages'])){
			$p_languages = htmlspecialchars($_POST['languages']);
		}else{
			$p_languages = "";
			$error[] = "languages";
		}

		if(!empty($_POST['email'])){
			$p_email = htmlspecialchars($_POST['email']);
		}else{
			$p_email = "";
			$error[] = "email";
		}

		if(!empty($_POST['username'])){
			$p_username = htmlspecialchars($_POST['username']);
		}else{
			$p_username = "";
			$error[] = "username";
		}

		if(!empty($_POST['password'])){
			$p_password = htmlspecialchars($_POST['password']);
		}else{
			$p_password = "";
			$error[] = "password";
		}
		/* einde controle om te kijken als alle velden zijn ingevuld en geposte gegevens verwerken */
		
		$options = $options = [
			'cost' => 12,
		];
		
		if(count($error) == 0){
			//alle gegevens zijn ingevuld, wachtwoord decrypten
			$p_password_encrypt = password_hash($p_password, PASSWORD_DEFAULT, $options);
		
			//gegevens naar database schrijven
			$db2 = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpassw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$sql2 = "INSERT INTO users 	(		langID
											,	firstname
											,	lastname
											,	gender
											,	birthday
											,	email
											,	username
											,	password
											,	createdon
											,	createdby
											,	lastupdateon
											,	lastupdateby
										)
								VALUES (		'".$p_languages."'
											,	'".$p_firstname."'
											,	'".$p_lastname."'
											,	'".$p_gender."'
											,	'".substr($p_birthday, 6, 4).'-'.substr($p_birthday, 0, 2).'-'.substr($p_birthday, 3, 2)."'
											,	'".$p_email."'
											,	'".$p_username."'
											,	'".$p_password_encrypt."'
											,	NOW()
											,	'".$p_username."'
											,	NOW()
											,	'".$p_username."'
										);
									";
			
			$query2 = $db2->prepare($sql2);
			$status = $query2->execute();

			if($status){
				$notice['message'] = "Your account has been created!";
				$notice['color'] = "green";
			}else{
				$notice['message'] = "Sorry, something went wrong creating your account. Please try again soon.";
				$notice['color'] = "red";
			}
		}else{
			$notice['message'] = "Not all fields were filled in!";
			$notice['color'] = "red";
			
			//geposte gegevens terugsturen
			$smarty->assign('firstname', $p_firstname);
			$smarty->assign('lastname', $p_lastname);
			$smarty->assign('birthday', $p_birthday);
			$smarty->assign('email', $p_email);
			$smarty->assign('username', $p_username);
		}
		$smarty->assign('notice', $notice);
	}

	//connectie opbouwen met de database; in select nooit array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'") als vierde argument meegeven
	$db = new PDO('mysql:host='.dbhost.';dbname='.dbname, dbuser, dbpassw);

	//producten ophalen
	$sql = "SELECT  langID
				, 	language
			FROM 	languages";
	
	$query = $db->prepare($sql);
	$query->execute();
	/*\PDO::FETCH_ASSOC and \PDO::FETCH_NUM allow you to define fetching mode. \PDO::FETCH_ASSOC will return only field => value array, whilst \PDO::FETCH_NUM return array with numerical keys only and \PDO::FETCH_BOTH will return result like in the answer. */
	//indien je niets meegeeft is het automatisch fetch_both
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	$aantalTalen = count($result);

	//door array gaan
	$i = 0;
	foreach($result as $row)
	{

		$languages[$i]['id'] 		= $row['langID'];
		$languages[$i]['language'] 	= $row['language'];
		
		$i++;
	
	}
		
	//database connectie sluiten
	$db = NULL;
	
	
	$smarty->assign('filename', 'register.tpl');
	$smarty->assign('siteurl', siteurl);
	$smarty->assign('languages', $languages);

	//template weergeven
	$smarty->display('layout.tpl');
?>