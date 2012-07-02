<?php
function update_profile_picture($id_user)
{
	$sucess = false;
	$picture_blob = '';
	$picture_size = 0;
	$picture_type = '';
	$picture_name = '';
	$picture_max = 1500000;
	
	$sucess = is_uploaded_file ($_FILES['profile_picture']['tmp_name']);
	if ( !$sucess )
	{
		echo"<div id='box'>Vous n'avez sélectionnée aucune image</div>";
		return false;
	}
	else
	{

	$picture_size = $_FILES['profile_picture']['size'];
	if ( $picture_size > $picture_max )
	{
		echo"<div id='box'>La taille de l'image dépasse la limite !</div>";
		return false;
	}
	$picture_type = $_FILES['profile_picture']['type'];
	$picture_name = $_FILES['profile_picture']['name'];
	
	include('modeles/connect_db.php');
	
	
	$picture_blob =  file_get_contents ($_FILES['profile_picture']['tmp_name']);
	
	$request = "UPDATE users SET profile_picture = '".addslashes($picture_blob)."' WHERE id_user=".$id_user;
	

	
	$sucess = mysql_query ($request) or die (mysql_error ());
	echo"<div id='box'>Votre image a bien été ajoutée !</div>";
	return;
	
		
	}	
}
	
	
	
function update_cover_picture($id_user)
{
	$sucess = false;
	$picture_blob = '';
	$picture_size = 0;
	$picture_type = '';
	$picture_name = '';
	$picture_max = 1500000;
	
	$sucess = is_uploaded_file ($_FILES['cover_picture']['tmp_name']);
	if ( !$sucess )
	{
		echo"<div id='box'>Vous n'avez sélectionné aucune image</div>";
		return false;
	}
	else
	{

	$picture_size = $_FILES['cover_picture']['size'];
	if ( $picture_size > $picture_max )
	{
		echo"<div id='box'>La taille de l'image dépasse la limite !</div>";
		return false;
	}
	$picture_type = $_FILES['cover_picture']['type'];
	$picture_name = $_FILES['cover_picture']['name'];
	
	include('modeles/connect_db.php');
	
	
	$picture_blob =  file_get_contents ($_FILES['cover_picture']['tmp_name']);
	
	$request = "UPDATE users SET cover_picture = '".addslashes($picture_blob)."' WHERE id_user=".$id_user;
	

	
	$sucess = mysql_query ($request) or die (mysql_error ());
	echo"<div id='box'>Votre image a bien été ajoutée !</div>";
	return;
	
		
	}	
}
?>