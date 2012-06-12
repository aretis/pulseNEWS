<?php
//--------------------------------------------------------------
//Christie Bunlon
//11/04/2012
//Function which tests the various errors in the form
//--------------------------------------------------------------



function check_register($pseudo, $password, $confirmpassword, $firstname, $surname, $mail, $areaname)
{
	$field_empty = 0;
	$pseudo_exists = 0;	
	$mail_exists = 0;
	$password_not_same = 0;
	
	// Checking empty fields	 
	if((empty($pseudo)) || (empty($password)) || (empty($confirmpassword))|| (empty($firstname)) || (empty($surname)) || (empty($mail)) || (empty($areaname)) )
	{
		$field_empty = 1;
	}
	// Checking pseudo or mail if already existing
	
	$query = 'SELECT pseudo, mail FROM users';
	$result = call_db($query);
		
	while($donnees = mysql_fetch_array($result))
	{
		if	(($donnees['pseudo']) == $pseudo || ($donnees['mail']==$mail))
		{	
			$pseudo_exists = 1;	
		}
		if	(($donnees['mail']==$mail))
		{	
			$mail_exists = 1;	
		}
	}
	
	mysql_free_result($result);
	mysql_close();
	
	// Checking if field password and confirmpassword are same
	if($password != $confirmpassword)
	{
		$password_not_same = 1;
	}
		
	if($field_empty == 0 && $pseudo_exists == 0 && $mail_exists == 0 && $password_not_same == 0)
	{
		include('modeles/valid_register.php');
		valid_register($pseudo,$password,$surname,$firstname,$mail,$areaname);
		//header('Location: index.php?page=validation');
	}
	
	echo"<span class='erreur'>";
	
	if($field_empty == 1)
	{
		echo'<br> Un ou plusieurs champ(s) sont vide(s)<br>';
	}
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
		echo'<br>Les deux mots de passe ne correspondent pas !';
	}
	echo"</span>";
}



?>