<?php
function transfert ($id_post)
{
	$erreur = 0;
	$sucess = false;
	$picture_blob = '';
	$picture_size = 0;
	$picture_type = '';
	$picture_name = '';
	$picture_max = 1500000;
	
	$sucess = is_uploaded_file ($_FILES['fichier']['tmp_name']);
	if (!$sucess )
	{
		echo"<div id='box'>Vous n'avez sélectionné aucune image</div>";

		$erreur = 5;

		return false;
	}
	else
	{

	$picture_size = $_FILES['fichier']['size'];
	if ( $picture_size > $picture_max )
	{
		echo "probleme";
		header('location:index.php?page=create_article');
		die("probleme");
		return false;
	}
	$picture_type = $_FILES['fichier']['type'];
	$picture_name = $_FILES['fichier']['name'];
	
	include('modeles/connect_db.php');
	
	
	$picture_blob =  file_get_contents ($_FILES['fichier']['tmp_name']);
	
	$request = "INSERT INTO pictures ("."post_id, picture_name, picture_size, picture_type, picture_blob ".") 
	VALUES ("."'".$id_post."','".$picture_name."', "."'".$picture_size."', "."'".$picture_type."', "."'".addslashes($picture_blob)."')";
	

	
	$sucess = mysql_query ($request) or die (mysql_error ());
	echo"<div id='box'>Votre image a bien été ajoutée !</div>";
	return;
	
	
	}	
}
?>




