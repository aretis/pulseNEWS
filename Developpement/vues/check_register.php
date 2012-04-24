<?php
//--------------------------------------------------------------
//Christie Bunlon
//11/04/2012
//Function which tests the various errors in the form
//--------------------------------------------------------------

global $field_empty;
global $pseudo_exists;
global $mail_exists;
global $password_not_same;
global $len_pseudo;
global $len_firstname;
global $len_surname;
global $mail_good;

function check_register($pseudo, $password, $confirmpassword, $firstname, $surname, $mail, $areaname)
{
	global $field_empty;
	global $pseudo_exists;
	global $mail_exists;
	global $password_not_same;
	global $len_pseudo;
	global $len_firstname;
	global $len_surname;
	global $mail_good;

	$field_empty = 0;
	$pseudo_exists = 0;	
	$mail_exists = 0;
	$password_not_same = 0;
	$len_pseudo = 0;
	$len_firstname = 0;
	$len_surname = 0;
	$mail_good = 1;
	
	// Checking empty fields	 
	if((empty($pseudo)) || (empty($password)) || (empty($confirmpassword))|| (empty($firstname)) || (empty($surname)) || (empty($mail)) || (empty($areaname)) )
	{
		$field_empty = 1;
	}
	
	// Checking lenght of pseudo, fistname and surname
	
	if(strlen($pseudo) < 4 || strlen($pseudo) > 20)
	{
		$len_pseudo = 1;
	}
	if(strlen($firstname) < 2 || strlen($firstname) > 50)
	{
		$len_firstname = 1;
	}
	if(strlen($surname) < 2 || strlen($surname) > 50)
	{
		$len_surname = 1;
	}
	// Checking pseudo or mail if already existing
	
	$query = 'SELECT pseudo, mail FROM users';
	include('call_db.php');
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
	mysql_close($link);
	
	// Checking if field password and confirmpassword are same
	if($password != $confirmpassword)
	{
		$password_not_same = 1;
	}
		
	// Checking if mail is good or not
	
	$Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#'; 
	if(preg_match($Syntaxe,$mail)) $mail_good = 0;

	if($field_empty == 0 && $pseudo_exists == 0 && $mail_exists == 0 && $password_not_same == 0 && $len_pseudo == 0 && $len_firstname == 0 && $len_surname == 0 && $mail_good == 0)
	{
		include('valid_register.php');
		valid_register($pseudo,$password,$surname,$firstname,$mail,$areaname);
		header('Location:validation.php');
	}
}?>