﻿

<link rel="stylesheet" href="design/register.css" />

	<form id='start' action='index.php?page=modifier_compte' method='post' >
	<div class='block_title'>modifier mon compte</div>
<hr>
	
	
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