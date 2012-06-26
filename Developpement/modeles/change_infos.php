<?php 
	include('modeles/connect_db.php');

	$id_user = $_SESSION['id_user'];
		mysql_query("SET NAMES 'utf8'");
	if(isset($_POST['about_me'])) 
	{
		$query = 'UPDATE users SET about = "'.$_POST['about_me'].'" WHERE id_user = '.$id_user;
	}

	 if(isset($_POST['humor'])) 
	{
		$query = 'UPDATE users SET about = "'.$_POST['humor'].'" WHERE id_user = '.$id_user;
	}
?>