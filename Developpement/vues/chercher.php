<html>
<body>
<link rel="stylesheet" href="design/profile1.css" />
<div class='post_news'   >

<form method="post" action="index.php?page=recherche">
Vous rechercher? <input type="search"name="recherche"/>
<select name ="mode">
	<option value="exp_exacte">l'expression exacte</option>
	<option value="all_mots">tout les mots </option>
	<option value="un_mot">Au moins un mot</option>
</select>
	 <SELECT name="categorie">
<?php
	
	$query = 'SELECT cat_name FROM news_cat';
	$result = call_db($query);

	while($data = mysql_fetch_assoc($result))
	{
		echo'<option>'.$data['cat_name'].'</option>';
	}
	
	mysql_free_result($result);
	mysql_close($link);

?>
</div>
</div>
</select>

<input type="submit" value ="rechercher" name ="rechercher"/>
</form>
