<html>
<body>

<link rel="stylesheet" href="design/register.css" />


<form method="post" action="index.php?page=recherche">
<input type="text"name="recherche"/>
<select name ="mode">
	<option value="exp_exacte">l'expression exacte</option>
	<option value="all_mots">tout les mots </option>
	<option value="un_mot">Au moins un mot</option>
</select>

	 Catégorie<SELECT name="region">
<?php
	
	$query = 'SELECT news_cat FROM cat_name';
	$result = call_db($query);

		while($donnees = mysql_fetch_array($result))
		{
			echo'<option>'.$donnees['categorie'].'</option>';
		}
	
	mysql_free_result($result);
	mysql_close($link);


/*<select name ="categorie">
	<option value="politique">politique</option>
	<option value="Economie">Economie </option>
	<option value="Faits_divers">Faits divers </option>
	<option value="sport">Sport</option>
	<option value="culture">Culture</option>
	<option value="Ecologie">Ecologie</option>
	</select>
<input type="submit" value ="rechercher" name ="rechercher"/>
	</form>

</body></html> */
?>
<html>
<body>
<br>
<br>

<link rel="stylesheet" href="design/register.css" />

	<form action='index.php?page=modifier_compte' method='post' >
	 Nom de l'utilisateur<input type="text" name="nom"/><br/>
	 Prénom<input type="text" name="prenom"/><br/>
	 nouveau mot de passe<input type="text" name="newPassword"/><br/>
	 confirmation du mot de passe<input type="text" name="confirmPassword"/><br/>
	 E-mail<input type="text" name="email"/><br/>
	 Voulez vous modifier votre ville?<input type="checkbox" name="modif_ville[]" value="valid"/ ><br/>
	 Ma région<SELECT name="region">
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
  </SELECT>
  
<br><br>
	
	supprimer mon compte &nbsp; <INPUT type="checkbox" name="delete_profil">

	<input type='submit'  value="envoyer"/>

</form>

</body>
</html>