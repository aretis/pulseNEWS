<?php

	$link = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		
	mysql_select_db("pulsenews")
		or die("Base de donn�es inaccessible.".mysql_error());
		

		
?>