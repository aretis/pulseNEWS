<?php

	include('modeles/call_db.php');
	
	$query = "SELECT id_post FROM posts NATURAL JOIN users WHERE type = 2 HAVING MAX(rate)";
	$result = call_db($query);
	
	$data = mysql_fetch_array($result)
	
	$query = 'DELETE FROM posts id_post = '.$data['id_post'];
	
	if(!mysql_query($query) )
	{
		echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
		return;
	}
?>