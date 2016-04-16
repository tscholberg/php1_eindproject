<?php
	include("includes/db.inc.php");
	
	//smarty path settings
	require('smarty/libs/Smarty.class.php');
	$smarty = new Smarty;
	$smarty->template_dir = 'smarty/templates/';
	$smarty->compile_dir = 'smarty/templates_c/';
	$smarty->config_dir = 'smarty/configs/';
	$smarty->cache_dir = 'smarty/cache/';

	//connectie opbouwen met de database; in select nooit array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'") als vierde argument meegeven
	$db = new PDO('mysql:host=cms;dbname='.dbname, dbuser, dbpassw);

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
	
	/*
	$languages[0]['id'] = 'nl';
	$languages[0]['language'] = 'nederlands';
	
	$languages[1]['id'] = 'en';
	$languages[1]['language'] = 'english';
	*/
	
	
	//database connectie sluiten
	$db = NULL;
	
	
	
	
	
	
	
	$smarty->assign('filename', 'register.tpl');
	$smarty->assign('languages', $languages);

	//template weergeven
	$smarty->display('layout.tpl');
?>