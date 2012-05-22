<html>
<body>
<form method="post" action="index.php?page=recherche">
<input type="text"name="recherche"/>
<select name ="mode">
	<option value="exp_exacte">l'expression exacte</option>
	<option value="all_mots">tout les mots </option>
	<option value="un_mot">Au moins un mot</option>
</select>

<select name ="categorie">
	<option value="politique">politique</option>
	<option value="Economie">Economie </option>
	<option value="Faits_divers">Faits divers </option>
	<option value="sport">sport</option>
	<option value="culture">culture</option>
	<option value="Ecologie">Ecologie</option>
	</select>
<input type="submit" value ="rechercher" name ="rechercher"/>
	</form>

</body></html>
