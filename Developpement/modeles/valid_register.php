//Function which puts informations about users in the DB
//Brice HOFFMANN,edit Salman ALAMDAR

<?php

function valid_register($pseudo,$password,$surname,$firstname,$mail,$areaname)
	{
	$link = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		
	mysql_select_db("pulsenews")
		or die("Base de données inaccessible.".mysql_error());
	
	mysql_query('INSERT INTO users VALUES("","'.$pseudo.'","'.$password.'","'.$surname.'","'.$firstname.'","'.$mail.'","", "", "'.$areaname.'","","")');
	
	mysql_close($link);
	}
?>