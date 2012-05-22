<?php 


$link = mysql_connect("localhost","root","")
	or die("Connexion impossible : ".mysql_error());
	
mysql_select_db("pulsenews")
	or die("Base de données inaccessible.".mysql_error());

$id_user = $_SESSION['id_user'];

if(isset($_POST['about_me'])) 
{
	
	
	$query = 'UPDATE users SET about = "'.$_POST['about_me'].'" WHERE id_user = '.$id_user;

}

 if(isset($_POST['humor'])) 
{

	
	$query = 'UPDATE users SET about = "'.$_POST['humor'].'" WHERE id_user = '.$id_user;

}?>