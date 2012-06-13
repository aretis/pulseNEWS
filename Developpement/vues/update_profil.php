<?php

$_SESSION['prenom']='christie';
$prenom=$_SESSION['prenom'];
include('connexion.php');
$requete="SELECT id_user FROM users WHERE pseudo='$prenom'";
$sucess=mysql_query($requete) or die(mysql_error());
while($data=mysql_fetch_assoc($sucess))
{
	if ( !empty($_POST['prenom']) )
	{
			$nouveau_prenom=$_POST['prenom'];
			include('connexion.php');
			$request = "UPDATE users SET pseudo = '".$nouveau_prenom."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
			echo 'ok!';
	}
	
		if ( !empty($_POST['nom']) )
	{
			$nouveau_nom=$_POST['nom'];
			include('connexion.php');
			$request = "UPDATE users SET surname = '".$nouveau_nom."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
			echo 'ok!';
	}
	
		if ( !empty($_POST['surnom']) )
	{
			$nouveau_surnom=$_POST['surnom'];
			include('connexion.php');
			$request = "UPDATE users SET surname = '".$nouveau_surnom."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
			echo 'ok!';
	}
	
		if ( !empty($_POST['password']) )
	{
			$nouveau_password=$_POST['password'];
			include('connexion.php');
			$request = "UPDATE users SET password = '".$nouveau_password."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
			echo 'ok!';
	}
	
	
	
		if ( !empty($_POST['about']) )
	{
			$nouveau_about=$_POST['about'];
			include('connexion.php');
			$request = "UPDATE users SET about = '".$nouveau_about."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
			echo 'ok!';
	}
	
	
		if ( !empty($_POST['email']) )
	{
			$nouveau_email=$_POST['email'];
	
			$request = "UPDATE users SET mail = '".$nouveau_email."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
		
	}
	
		if ( $_POST['modif_ville']== 'valid2' )
	{
	zehgijokptmelkdsijhu
			$nouveau_region=$_POST['jiji'];

			$request = "UPDATE users SET area_name = '".$nouveau_region."' WHERE  id_user=".$data['id_user']."";
			$resultat = mysql_query ($request) or die (mysql_error ());
		
	}
			
}

