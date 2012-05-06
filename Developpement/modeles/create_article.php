

<?php

/*Fonction créée par Michel GILLE le 02/05/12*/

function create_article($article)
{
	
		
	$req = call_db('SELECT id_user FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_user = $data['id_user'];
    } 
	
	$req = call_db('SELECT id_cat FROM NEWS_CAT WHERE cat_name = "'.$article['cat'].'";');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_cat = $data['id_cat'];
    } 
	
	$req = call_db('SELECT id_area FROM AREAS WHERE area_name = "'.$article['area'].'";');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_area = $data['id_area'];
    } 

	include_once('modeles/db_connect.php');
	
	$query = 'INSERT INTO posts VALUES("", "'.$id_user.'", "'.$article['title'].'", "'.$article['description'].'", "'.$article['content'].'", "'.$id_cat.'", "0", NOW(), "'.$id_area.'")';
	
	$test = mysql_query($query);
	
	
	mysql_close();
	
}

?>