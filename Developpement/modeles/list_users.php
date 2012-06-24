<?php

	include('modeles/call_db.php');
	
	$query = "SELECT pseudo FROM users";
	$result = call_db($query);
		
	while($data = mysql_fetch_array($result))
	{
		echo $data['pseudo'];
		echo "&nbsp; ===>";
		echo"<a href='index.php?page=profile&pseudo=".$data['pseudo']."'>Voir son profil !</a><br>";
	}
?>