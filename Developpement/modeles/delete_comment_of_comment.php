<?php
	/* Delete a comment
		18/05/2012
		Salman ALAMDAR
	*/

	$query = 'DELETE FROM comment_a_comment WHERE id ='.$_GET['delete_comment_of_comment'];
	$result = call_db($query);

	if(!mysql_query($query) )
	{
		echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
		return;
	}
	
	echo"<div id='box'>Votre commentaire à bien été supprimé !</div>";
?>