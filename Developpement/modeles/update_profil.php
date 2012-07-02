<?php
$prenom=$_SESSION['pseudo'];
include('modeles/connect_db.php');
if ( isset($_POST['prenom']) || isset($_POST['nom']) || isset($_POST['surnom']) || isset($_POST['newPassword']) || isset($_POST['confirmPassword']) || isset($_POST['email']) || isset($_POST['region']))
{
	$requete="SELECT id_user FROM users WHERE pseudo='".$prenom."'";
	$result = call_db($requete);

	while($data=mysql_fetch_assoc($result))
	{
		if ( !empty($_POST['prenom']) )
		{
				$nouveau_prenom=$_POST['prenom'];
				$request = "UPDATE users SET firstname = '".$nouveau_prenom."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
		}
		
			if ( !empty($_POST['nom']) )
			{
				$nouveau_nom=$_POST['nom'];
				$request = "UPDATE users SET surname = '".$nouveau_nom."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
			}
		
			$lol = 0;
			if ((!empty($_POST['newPassword'] )) && (!empty($_POST['confirmPassword'])))
			{
				if($_POST['newPassword'] == $_POST['confirmPassword'])
				{
					$nouveau_password=$_POST['newPassword'];
					$request = "UPDATE users SET password = '".$nouveau_password."' WHERE  id_user=".$data['id_user']."";
					$resultat = mysql_query ($request) or die (mysql_error ());
				}
				else
				{
					echo"<div id='box'>Les champs mot de passe ne correspondent pas!</div>";
					$lol = 1;
				}
			}
			else if(empty($_POST['newPassword']) && empty($_POST['confirmPassword']))
			{
				
			}
			else
			{
				echo'<div id=\'box\'>Veuillez remplir les deux champs de mot de passe</div>';
			}
			
			if ( !empty($_POST['email']) )
			{
				$nouveau_email=$_POST['email'];
				$request = "UPDATE users SET mail = '".$nouveau_email."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
			}
		
		
			if ( !empty($_POST['modif_ville']) )
			{
				$nouveau_region=$_POST['region'];
				$request = "UPDATE users SET area_name = '".$nouveau_region."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
			}
			
			if ( !empty($_POST['delete_profil']))
			{
				$request = "DELETE FROM users WHERE id_user =".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error());
				
				unset($_SESSION['pseudo']);
				session_destroy();
			}
			
			if($lol == 0) echo'<div id="box">Votre compte à bien était modifié!</div>';
	}
}
?>