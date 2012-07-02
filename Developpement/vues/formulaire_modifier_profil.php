

<link rel="stylesheet" href="design/register.css" />

	<form id='start' action='index.php?page=modifier_compte' method='post' >
	<div class='block_title'>modifier mon compte</div>
<hr>
	
	
	 <label for='name'>Nom de l'utilisateur</label><input type="text" name="nom"/><br/>
	 <label for='name'>Prénom</label><input type="text" name="prenom"/><br/>
	 <label for='name'>Nouveau mot de passe</label><input type="password" name="newPassword"/><br/>
	 <label for='name'>Confirmation</label><input type="password" name="confirmPassword"/><br/>
	<label for='name'> E-mail</label><input type="text" name="email"/><br/>
	<label for='name'> Modifier votre ville ?</label><input type="checkbox" name="modif_ville[]" value="valid"/ ><br><br>
	<label for='name'> Ma région</label><SELECT name="region">
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
	
	<label for='name'>Supprimer mon compte </label>&nbsp; <INPUT type="checkbox" name="delete_profil"><br><br>

	<input type='submit'  value="envoyer" style='position:relative;left:400px;'/>

</form>

</body>
</html>