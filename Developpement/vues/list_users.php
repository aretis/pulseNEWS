<?php	

	include('modeles/call_db.php');
	
	$query = "SELECT * FROM users";
	$result = call_db($query);
	echo"<section id='photos'>";
	while($data = mysql_fetch_array($result))
	{
		if (empty($data['profile_picture']))
		{
			echo"<img src='design/img/exemple_profile.jpg'/>";
		}
		else
		{
			$image = imagecreatefromstring($data['profile_picture']);
			ob_start();
			imagejpeg($image, null, 80);
			$data = ob_get_contents();
			ob_end_clean();
			echo '<img src="data:image/jpg;base64,' .  base64_encode($data)  . '" />';
		}
		echo"<a href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']."</a>";
	}
	echo"</section>";
?>