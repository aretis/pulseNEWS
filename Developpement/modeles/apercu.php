<?php
function afficher_image($id)
{
	if ( isset ($id))
	{
		//$id = intval ($id);
		include ("connexion.php");
	
		$request = "SELECT id_user, picture_type, picture_blob FROM pictures WHERE id_user = $id";

		$sucess = mysql_query ($request) or die (mysql_error ());
		$col = mysql_fetch_assoc($sucess);
			if ( !$col['id_user'])
			{
				echo "Id d'image inconnu";
			}
			else
			{
			$image = imagecreatefromstring($col['picture_blob']);
			ob_start();
			imagejpeg($image, null, 80);
			$data = ob_get_contents();
			ob_end_clean();
			echo '<img src="data:image/jpg;base64,' .  base64_encode($data)  . '" />';

			
			
			}
	}
	else 
	{
		echo "ya rien";
	}
}	
?>
