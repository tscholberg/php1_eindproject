<?php
	include("includes/db.inc.php");

	$t = new templateparser;
	
	//indien er niets is gepost lege velden meesturen; dit laten staan VOOR de isset post
	$t->assign('firstname', "");
	$t->assign('lastname', "");
	$t->assign('birthday', "");
	$t->assign('email', "");
	$t->assign('username', "");

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
			$db2 = new database;
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
											,	'".substr($p_birthday, 6, 4).'-'.substr($p_birthday, 3, 2).'-'.substr($p_birthday, 0, 2)."'
											,	'".$p_email."'
											,	'".$p_username."'
											,	'".$p_password_encrypt."'
											,	NOW()
											,	'".$p_username."'
											,	NOW()
											,	'".$p_username."'
										);
									";
			
			$query2 = $db2->run($sql2);
			$status = $query2->fetch();
			$db2->close();

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
			$t->assign('firstname', $p_firstname);
			$t->assign('lastname', $p_lastname);
			$t->assign('birthday', $p_birthday);
			$t->assign('email', $p_email);
			$t->assign('username', $p_username);
		}
		$t->assign('notice', $notice);
	}

	$db = new database;

	//producten ophalen
	$sql = "SELECT  langID
				, 	language
			FROM 	languages";
	
	$query = $db->run($sql);
	$result = $db->fetch();
	$aantalTalen = count($result);
	$db->close();

	//door array gaan
	$i = 0;
	foreach($result as $row)
	{

		$languages[$i]['id'] 		= $row['langID'];
		$languages[$i]['language'] 	= $row['language'];
		
		$i++;
	
	}
	
	$t->assign('filename', 'register.tpl');
	$t->assign('siteurl', siteurl);
	$t->assign('languages', $languages);

	//template weergeven
	$t->display('layout.tpl');
?>