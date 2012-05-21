<?php

	/* Connexion to the DATABASE
		Salman ALAMDAR
		15/04/12 */
	

	$link = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
	
	mysql_select_db("pulsenews")
		or die("Base de données inaccessible.".mysql_error());
			
?>