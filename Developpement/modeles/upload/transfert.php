<?php
function transfert ()
{
	$sucess = false;
	$picture_blob = '';
	$picture_size = 0;
	$picture_type = '';
	$picture_name = '';
	$picture_max = 64000;
	
	$sucess = is_uploaded_file ($_FILES['fichier']['tmp_name']);
	if ( !$sucess )
	{
		echo "Problème de transfert";
		return false;
	}
	else
	{

	$picture_size = $_FILES['fichier']['size'];
	if ( $picture_size > $picture_max )
	{
		echo "le fichier ne peut être enregistré,la taille n'est pas respectée!";
		return false;
	}
	$picture_type = $_FILES['fichier']['type'];
	$picture_name = $_FILES['fichier']['name'];
	
	include('connexion.php');
	
	
	$picture_blob =  file_get_contents ($_FILES['fichier']['tmp_name']);
	
	$request = "INSERT INTO pictures ("."picture_name, picture_size, picture_type, picture_blob ".") 
	VALUES ("."'".$picture_name."', "."'".$picture_size."', "."'".$picture_type."', "."'".addslashes($picture_blob)."')";
	

	
	$sucess = mysql_query ($request) or die (mysql_error ());
	return true;
	
	}	
}
?>




