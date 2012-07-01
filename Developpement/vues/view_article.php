
<div style='width: 60%; margin: auto;'>

<?php

	if(isset($_GET['delete_comment'])) include('modeles/delete_comment.php');
	
	else if(isset($_GET['delete_comment_of_comment'])) include('modeles/delete_comment_of_comment.php');
	
	if(isset($_GET['delete_post'])) include('modeles/delete_post.php');
	
	include('modeles/pulse.php');
	
	if(isset($_POST['comment']))
	{
		include('modeles/save_comment.php');
		save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['comment']);
	}
	else if(isset($_POST['comment_a_comment']))
	{	
		include('modeles/save_comment_comment.php');
		save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['id_parent'], $_POST['comment_a_comment']);
	}
	
	
	if(isset($_GET['PROpulse']))
	{
	
		pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['PROpulse']);
	}
	else if(isset($_GET['DEpulse']))
	{
	
		pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['DEpulse']);
	}






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