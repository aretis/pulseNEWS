<?php
session_start();
?>
<?php
$prenom=$_SESSION['pseudo'];
include('connexion.php');
if ( isset($_POST['prenom']) || isset($_POST['nom']) || isset($_POST['surnom']) || isset($_POST['newPassword']) || isset($_POST['confirmPassword']) || isset($_POST['email']) || isset($_POST['region']))
{
	$requete="SELECT id_user FROM users WHERE pseudo='".$prenom."'";
	$result = call_db($requete);

	while($data=mysql_fetch_assoc($result))
	{
		if ( !empty($_POST['prenom']) )
		{
				$nouveau_prenom=$_POST['prenom'];
				$request = "UPDATE users SET pseudo = '".$nouveau_prenom."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
		}
		
			if ( !empty($_POST['nom']) )
			{
				$nouveau_nom=$_POST['nom'];
				$request = "UPDATE users SET surname = '".$nouveau_nom."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
			}
		
			if ( !empty($_POST['surnom']) )
			{
				$nouveau_surnom=$_POST['surnom'];
				$request = "UPDATE users SET surname = '".$nouveau_surnom."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
			}
		
			if ((!empty($_POST['newPassword'] )) && (!empty($_POST['confirmPassword'])))
			{
				$id=$_SESSION['id_user'];
				$request = "SELECT password FROM users WHERE id_user=".$id;
				$succes=mysql_query ($request) or die (mysql_error());
				while ($resultat=mysql_fetch_assoc($succes))
				{
					$password=$resultat['password'];
					if($_POST['password'] == $password )
					{
						$nouveau_password=$_POST['newPassword'];
						$request = "UPDATE users SET password = '".$nouveau_password."' WHERE  id_user=".$data['id_user']."";
						$resultat = mysql_query ($request) or die (mysql_error ());
					}
					else
					{
						echo"les champs de confirmation de nouveaux mot de passe ne correspondent pas!";
					}
				}
			}
			else 
			{
				echo'un ou plusieurs des champs de validation de mot de passe sont vide!';
			}

		
			if ( !empty($_POST['email']) )
			{
				$nouveau_email=$_POST['email'];
				$request = "UPDATE users SET mail = '".$nouveau_email."' WHERE  id_user=".$data['id_user']."";
				$resultat = mysql_query ($request) or die (mysql_error ());
			}
		
			if ( !empty($_POST['region']) )
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
			
			header('location:index.php?page=news');
			echo' Votre compte à bien était modifié!';
	}
}
?>