<table class='create_article'>
<form action='#' method='post' enctype="multipart/form-data">
<tr class='title_create_article'><td>titre</td><td><input style='width: 500px;' type='text' name='title'/></td></tr>
<tr><td class='title_create_article'>image</td><td><input type='file' name='fichier' size='10'/></td></tr>
<tr><td class='title_create_article'>description</td><td><textarea style='width: 500px; height: 75px; font-family: Arial;' type='text' name='description'></textarea></td></tr>
<tr><td class='title_create_article'>contenu</td><td><textarea style='width: 600px; height: 400px; font-family: Arial;' type='text' name='content'></textarea></td></tr>
<tr><td class='title_create_article'>région</td><td><SELECT id='name' select='selected' name='area'>
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
 <tr><td class='title_create_article'>catégorie</td>
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
	if( $field_errors == 1)
	{
		echo"<div class='create_article_errors'> Un ou plusieurs champs sont manquants! </div>";
	}
?>
