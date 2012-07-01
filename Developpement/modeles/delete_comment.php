<?php
	/* Delete a comment
		18/05/2012
		Salman ALAMDAR
	*/

	$query = 'DELETE FROM comments WHERE id_comment='.$_GET['delete_comment'];
	$result = call_db($query);

	if(!mysql_query($query) )
	{
		echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
		return;
	}
	
	echo"<div id='box'>Votre commentaire a bien été supprimé !</div>";
?>