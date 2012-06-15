<?php
	include ('/../modeles/profile_print.php');
	include ('/../modeles/call_db.php');
	include('modeles/connect_db.php');

	mysql_query("SET NAMES 'utf8'");
	$id_user = $_SESSION['id_user'];
	if (isset( $_FILES['cover_picture']['tmp_name']))
	{
		update_cover_picture($id_user);
	}
	if (isset( $_FILES['profile_picture']['tmp_name']))
	{
		update_profile_picture($id_user);
	}
	if(isset($_POST['about_me'])) 
	{
		echo " Vos informations ont bien été modifiés !";
		$query = 'UPDATE users SET about = "'.$_POST['about_me'].'" WHERE id_user = '.$id_user;
		if ( !mysql_query($query)) echo"La requete n'a pas aboutie";
	}
	if(isset($_POST['humeur'])) 
	{
		echo $_POST['humeur'];
		echo " Vos informations ont bien été modifiés !";
		$query = 'UPDATE users SET humor = "'.$_POST['humeur'].'" WHERE id_user = '.$id_user;
		if ( !mysql_query($query)) echo"La requete n'a pas aboutie";
	}


	mysql_query("SET NAMES 'utf8'");
	$pseudo = $_SESSION['pseudo'];
	$req = mysql_query("SELECT * FROM users WHERE pseudo='$pseudo'");
	$req2 = mysql_fetch_assoc($req);
	$pseudo = $req2['pseudo'];
	$id_user = $req2['id_user'];
	$surname = $req2['surname'];
	$mail = $req2['mail'];
	$area_name = $req2['area_name'];
	$firstname = $req2['firstname'];
	$about = $req2['about'];
	$humor = $req2['humor'];
?>