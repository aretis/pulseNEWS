<?php

	if ( isset($_GET['id']) )
	{
		$id = intval ($_GET['id']);
		include ("connexion.php");
	
		$request = "SELECT picture_id, picture_type, picture_blob FROM pictures WHERE picture_id = $id";

		$sucess = mysql_query ($request) or die (mysql_error ());
		$col = mysql_fetch_assoc($sucess);
		print_r($col);
		if($col === false )
		{
			echo "La requête est incorrect<br />".htmlentities($request).'<br />'.mysql_error();
			return;
		}
		if ( !$col['picture_id'])
		{
			echo "Id d'image inconnu";
		}
		else
		{
		$image = imagecreatefromstring($col['picture_blob']);
		ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
		imagejpeg($image, null, 80);
		$data = ob_get_contents();
		ob_end_clean();
		echo '<img src="data:image/jpg;base64,' .  base64_encode($data)  . '" />';

		}
	}	
?>
