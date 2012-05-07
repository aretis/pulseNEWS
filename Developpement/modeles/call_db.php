<?php

/*  Salman ALAMDAR
	Function Call DB
	Just put your query in arguments of this function
	Returns you an array which have data of the request
	USE IT FOR DISPLAY SOMETHING
	DO NOT USE IT TO WRITE SOMETHING IN THE DB
	12/04/2012
*/

global $link;

function call_db($query)
	{
	global $link;
	
	$link = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		
	mysql_select_db("pulsenews")
		or die("Base de données inaccessible.".mysql_error());
	
	mysql_query("SET NAMES 'utf8'");
	
	
	$result = mysql_query($query)
		or die('Echec de la requête'.mysql_error());
		
		
	return $result;
	}?>