<?php
	include("includes/db.inc.php");
	require_once("includes/global.inc.php");

	$t = new templateparser;
	
	$t->assign('filename', 'feed.tpl');
	$t->assign('siteurl', siteurl);

	$db = new database;

	$sql = "";
	if(!empty($_POST['search'])){
		$search = htmlspecialchars($_POST['search']);
		
		$tagsArr = array();
		
		$postArr = explode(" ", $search);
		foreach($postArr as $v){
			if($v[0] == "#"){	
				$laatsteletter = substr($v, -1, 1);
				if($laatsteletter == '.' OR $laatsteletter == ',' OR $laatsteletter == '!' OR $laatsteletter == '?' OR $laatsteletter == ')'){
					$v = substr($v, 0, -1);
				}
				$tagsArr[] = $v;
			}
		}
		
		$tagsArr = implode($tagsArr);
		$tagsArr = explode("#", $tagsArr);
		
		foreach($tagsArr as $tag){
			if(strlen($tag) > 0 ){	
				$arrSearch[] = $tag;
			}
		}

		if(count($arrSearch) > 0){
			$sql = "SELECT  	description, picture
					FROM 		posts
					WHERE 		description LIKE '%";

			$zoekwoorden = implode($arrSearch, ", ");
			$zoekwoorden = str_replace(', ', "%' OR description LIKE '%", $zoekwoorden);
			
			$sql .= $zoekwoorden;
			 
			$sql .= "%' ORDER BY	uploaddate DESC
					LIMIT 0, 20";
					
		}
	}else{
		//producten ophalen
		$sql = "SELECT  	description, picture
				FROM 		posts
				ORDER BY	uploaddate DESC
				LIMIT 0, 20";
	}
	
	$query = $db->run($sql);
	$result = $db->fetch();
	$db->close();

	$t->assign('afb', $result);
	$t->assign('descr', $result);

	//template weergeven
	$t->display('layout.tpl');
?>