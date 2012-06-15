<?php
//--------------------
//function print_profil
//Brice HOFFMANN
//22/04/2012
//--------------------

function print_profile($key,$pseudo,$surname,$firstname,$mail,$area_name,$about,$humor)
	{
	include('modeles/connect_db.php');
	
	mysql_query("SET NAMES 'utf8'");
	
	 mysql_query('SELECT * FROM USERS("'.$key.'","'.$pseudo.'","'.$surname.'","'.$area_name.'","'.$firstname.'","'.$mail.'","'.$about.'","'.$humor.'")');

		include('call_db.php');
	mysql_close();
	}
?>