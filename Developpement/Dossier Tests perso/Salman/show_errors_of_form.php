<?php

	/* Function which display errors of the form in PHP
	Salman ALAMDAR
	19/04/12*/
		
	echo"<span class='erreur'>";
	
	if($field_empty == 1)
	{
		echo'<br> Un ou plusieurs champ(s) sont vide(s)<br>';
	}
	else
	{
		if($pseudo_exists == 1)
		{
			echo'<br>Ce pseudo est déja existant ! Merci d\'en choisir un autre. <br>';
		}
		if($mail_exists == 1)
		{
			echo'<br>Cette adresse e-mail est déja existante !<br>';
		}
		if($password_not_same == 1)
		{
			echo'<br>Les deux mots de passe ne correspondent pas !<br>';
		}
		if($len_pseudo == 1)
		{
			echo'<br>Votre pseudo doit être compris entre 4 et 20 caractères !<br>';
		}
		if($len_firstname == 1)
		{
			echo'<br>Le champ prénom doit être compris entre 2 et 50 caractères !<br>';
		}
		if($len_surname == 1)
		{
			echo'<br>Le champ nom doit être compris entre 2 et 50 caractères !<br>';
		}
		if($mail_good == 1)
		{
			echo'<br>L\'adresse mail n\'est pas valide !';
		}
	}
	echo"</span>";
		
?>