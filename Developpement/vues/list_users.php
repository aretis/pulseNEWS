<form>
<input type='search' name='pulseur'>
<input type='submit' name ='valider'>
</form>
<br>


<?php	
	
	include('modeles/call_db.php');
	
	$query = "SELECT * FROM users";
	$result = call_db($query);
	echo"<section id='photos'>";
	while($data = mysql_fetch_array($result))
	{
		if( isset($_SESSION['pseudo']) && $data['pseudo'] == $_SESSION['pseudo'])
		{
			
		}
		else
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
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
			}
			echo"<div class='user_link'><a href='index.php?page=profile&pseudo=".$data['pseudo']."'>&nbsp;".$data['pseudo']."</a>&nbsp;</div>";
		}
	}
	echo"</section>";
?>