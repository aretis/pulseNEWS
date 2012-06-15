<?php

	include('modeles/connect_db.php');
	
	$query = 'DELETE FROM posts WHERE type = 2 HAVING rate < max(rate)';
	
	if(!mysql_query($query) )
	{
		echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
		return;
	}
?>