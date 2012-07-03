<?php
	include('modeles/connect_db.php');
	$prenom = $_SESSION['pseudo'];
	if(isset($_POST['password']))
	{
		$requete="SELECT password FROM users WHERE pseudo='".$prenom."'";
		$sucess=mysql_query($requete)or die(mysql_error());
		while ( $resultat=mysql_fetch_assoc($sucess))
		{
			if (($_POST['password']) == $resultat['password'])
			{
				header('location:index.php?page=modifier_compte');
			}
			else 
			{
				echo "<div id='box'>Votre mot de passe est incorrect !</div>";
			}
		}
	}
?>