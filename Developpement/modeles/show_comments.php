<?php

	/* Function which show all the comments
		Salman ALAMDAR
		13/05/2012
	*/
	
	function save_comment($id_post, $id_user, $content)
	{
		$query = 'SELECT area_name FROM AREAS';
		include('call_db.php');
		$result = call_db($query);

	while($donnees = mysql_fetch_array($result))
	{
		echo'<option>'.$donnees['area_name'].'</option>';
	}
	}
?>