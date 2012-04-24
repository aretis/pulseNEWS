<?php

	/* Function which display errors of the connexion form in PHP
		Salman ALAMDAR
		19/04/12 
	*/
	
	echo"<span class='erreur'>";
	
	if($field_empty == 1)
	{
		echo'<br> Un ou plusieurs champ(s) sont vide(s)<br>';
	}
	else
	{
		if($pseudo_not_exists == 0)
		{
			echo'<br>Ce pseudo n\'existe pas, merci de créé un compte';
		}
		else if($login_ok == 0)
		{
			echo'<br>Le pseudo ou le mot de passe sont incorrects<br>';
		}
	}
	
	echo"</span>";
?>