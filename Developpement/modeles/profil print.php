<?php
//--------------------
//function print_profil
//Brice HOFFMANN
//22/04/2012
//--------------------

function print_profil($key,$pseudo, $surname , $firstname ,$mail , $area_name , $about ,)
	{
	$link = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		
	mysql_select_db("pulsenews")
		or die("Base de données inaccessible.".mysql_error());
	
	mysql_query('SELECT * FROM USERS("'.$key.'","'.$pseudo.'","'.$surname.'","'.$area_name.'","'.$firstname.'","'.$mail.'",""("'.$about.'")');
		include('call_db.php');
	$result = call_db($query);
	mysql_close($link);
	}
?>