
<div style='width: 60%; margin: auto;'>

<?php

	mysql_query("SET NAMES 'utf8'");

	$id_post = $_GET['id_post'];

	
	$query = "SELECT id_user FROM posts WHERE id_post = ".$id_post;
	$req = mysql_query($query);
	while ($data = mysql_fetch_assoc($req))
	{
		$id_user = $data['id_user'];
	}
	
	$query = "SELECT pseudo FROM users WHERE id_user = ".$id_user;
	$req = mysql_query($query);
	while ($data1 = mysql_fetch_assoc($req))
	{
		$pseudo = $data1['pseudo'];
	}
	
	$query = 'SELECT * FROM POSTS WHERE id_post = '.$id_post;
	$req = mysql_query($query);

	include('modeles/show_posts.php');
?>
</div>