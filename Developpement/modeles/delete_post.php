<?php
	/* Delete a post
		20/02/2012
		Salman ALAMDAR */
	

	$query = 'DELETE FROM posts WHERE id_post='.$_GET['delete_post'];
	$result = call_db($query);

	if(!mysql_query($query) )
	{
		echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
		return;
	}
	
	echo"Votre post à bien été supprimé !";

?>