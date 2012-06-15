<?php
	$id_post=$_GET['id'];
	include('modeles/connect_db.php');
	$requete='SELECT * FROM post WHERE id_post='.$id_post;
	$succes=mysql_query($requete) or die(mysql_error());

	While($resultats=mysql_fetch_assoc($sucess))
	{
		if(isset($_GET['pseudo']))
		{
			$query = "SELECT id_user FROM users WHERE pseudo ='".$_GET['pseudo']."'";
			
			$result = call_db($query);
				
			$id = mysql_result($result, 0);
			$req = view_article_user($id);
			include('modeles/show_posts.php');
		}
		else
		{
			$req = view_article_user($_SESSION['id_user']);
			include('modeles/show_posts.php');
		}
	}
?>