<?php

	$link = mysql_connect("localhost","pulsenews","scmb060712")
		or die("Connexion impossible : ".mysql_error());
	
	mysql_select_db("pulsenews")
		or die("Base de données inaccessible.".mysql_error());
	
	$query = 'DELETE FROM posts WHERE type = 2 HAVING rate < max(rate)';
	
	if(!mysql_query($query) )
	{
		echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
		return;
	}
?>