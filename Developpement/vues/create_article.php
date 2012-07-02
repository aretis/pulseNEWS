
<table class='create_article'>
<form action='#' method='post' enctype="multipart/form-data">
<tr><td></td><td class='block_title'>Rédiger un article</td></tr>
<tr><td></td><td><hr></td></hr>
<tr class='title_create_article'><td>Titre</td><td><input style='width: 500px;' type='text' name='title' value='<?php if (isset($_POST['title'])) echo $_POST['title']; ?>'/></td></tr>
<tr><td class='title_create_article'>Image</td><td><input type='file' name='fichier' size='10'/></td></tr>
<tr><td class='title_create_article'>Description</td><td><textarea style='width: 500px; height: 75px; font-family: Arial;' type='text' name='description'><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea></td></tr>
<tr><td class='title_create_article'>Contenu</td><td><textarea style='width: 600px; height: 250px; font-family: Arial;' type='text' name='content'><?php if (isset($_POST['content'])) echo $_POST['content']; ?></textarea></td></tr>
<tr><td class='title_create_article'>Région</td><td><SELECT id='name' select='selected' name='area'>
<?php

$query = 'SELECT area_name FROM AREAS';
$result = call_db($query);

	while($donnees = mysql_fetch_array($result))
	{
		echo'<option>'.$donnees['area_name'].'</option>';
	}
	
	mysql_free_result($result);
	mysql_close($link);
	
?>
 </SELECT></td>
 <tr><td class='title_create_article'>Catégorie</td>
 <td><SELECT id='name' select='selected' name='cat'>
<?php

$query = 'SELECT cat_name FROM NEWS_CAT';
$result = call_db($query);

	while($donnees = mysql_fetch_array($result))
	{
		echo'<option>'.$donnees['cat_name'].'</option>';
	}
	
	mysql_free_result($result);
	mysql_close($link);
	
?>
 </SELECT>
 
 
 </td></tr>
<tr><td></td><td><input type='submit' value=' publier ! '/></td></tr>

</form>

</table>
<?php
if( $field_errors == 1 || $no_image == 1 )
{
	echo"<div id='box'>";

	if( $field_errors == 1)
	{
		echo"Un ou plusieurs champs sont manquants ! ";
	}
	if( $no_image == 1)
	{
		echo"Vous n'avez pas ajouté d'image ! ";
	}
<<<<<<< HEAD
	
	echo"</div>";
}
=======
	else if(isset($erreur) && $erreur == 5) {
		
	echo"<div id='box'>Vous n'avez sélectionné aucune image</div>";
	return;
	}
>>>>>>> c4b6e168beb53e54269a96d06f9329910225f35d
?>
