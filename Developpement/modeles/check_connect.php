﻿<?php
//--------------------
//check_connect.php
//Christie Bunlon
//12/04/2012
//--------------------

global $field_empty;
global $login_ok;
global $pseudo_not_exists;

function check_connect($pseudo, $password)
{
	global $field_empty;
	global $login_ok;
	global $pseudo_not_exists;

	$field_empty = 0;
	$login_ok = 0;
	$pseudo_not_exists = 0;
	
	// Checking empty field
	if((empty($pseudo)) || (empty($password)))
	{
		$field_empty = 1;
	}
	
	$query = 'SELECT pseudo, password FROM users';
	include('call_db.php');
	$result = call_db($query);
	
	while($donnees = mysql_fetch_array($result))
	{
		if($donnees['pseudo'] == $pseudo)
		{
			$pseudo_not_exists = 1;
			
			if($donnees['password'] == $password)
			{
				$login_ok = 1;
			}
		}
	}

	if($field_empty == 0 && $login_ok == 1)	
	{
		$query = 'SELECT id_user FROM users WHERE pseudo="'.$pseudo.'"';
		$result = call_db($query);
		
		$donnees = mysql_fetch_array($result);
		
		$_SESSION['pseudo'] = $pseudo;
		$_SESSION['id_user'] = $donnees['id_user'];
		
		?>
		<script language="Javascript">
			document.location.replace("index.php?page=profile");
		</script>
		<?php
	}
}
?>