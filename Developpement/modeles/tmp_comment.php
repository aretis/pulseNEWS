<?php

include('save_comment.php');

$id_post=1;
$id_user=1;
$content ="OUAIIIII TROP LOL QUOI";

save_comment($id_post, $id_user, $content)

	$query = 'SELECT area_name FROM AREAS';
	include('call_db.php');
	$result = call_db($query);

	while($donnees = mysql_fetch_array($result))
	{
		echo'<option>'.$donnees['area_name'].'</option>';
	}

?>		

	


