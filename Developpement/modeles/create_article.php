

<?php

/*Fonction créée par Michel GILLE le 02/05/12*/

function create_article($article)
{
	include_once('modeles/db_connect.php');
		
		
		
	$id_user = call_db('SELECT id_user FROM USERS WHERE pseudo = "'.$_SESSION['pseudo'].'";');
	echo "id_user = ".$id_user;
	
	$id_cat = call_db('SELECT id_cat FROM NEWS_CAT WHERE cat_name = "'.$article['cat'].'";');
	$id_area = call_db('SELECT id_area FROM AREAS WHERE area_name = "'.$article['area'].'";');
	
	$query = 'INSERT INTO POSTS VALUES (NULL, 1, "'.$article['title'].'", "'.$article['description'].'", "'.$article['content'].'", "1", "0", TIMESTAMP(), "1");';
	
	mysql_query($query);
	
	echo var_dump($query);
	
	mysql_close();
	
}

?>