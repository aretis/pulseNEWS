<?php

/*Fonction créée par Michel GILLE le 02/05/12*/

function create_article($article)
{
	$req = call_db('SELECT id_user FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_user = $data['id_user'];
    } 
	
	$req = call_db('SELECT id_cat FROM news_cat WHERE cat_name = "'.$article['cat'].'";');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_cat = $data['id_cat'];
    } 
	
	$req = call_db('SELECT id_area FROM areas WHERE area_name = "'.$article['area'].'";');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_area = $data['id_area'];
    } 

	
	$article['content'] = str_replace("\"","'",$article['content']);
	
	
	include_once('modeles/connect_db.php');
	
	
	$query = 'INSERT INTO posts VALUES("", "'.$id_user.'", "0", "'.$article['title'].'", "'.$article['description'].'", "'.$article['content'].'", "'.$id_cat.'", "0", NOW(), "'.$id_area.'")';
	
	mysql_query($query);
	
	
	
	$req = call_db('SELECT id_post FROM posts');
	
	while($data = mysql_fetch_assoc($req)) 
    { 
		$id_post = $data['id_post'];
    } 
	
	$erreur = transfert($id_post);
	
	mysql_close();
	
	return $erreur;
	
}

?>