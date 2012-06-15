<?php
include('modeles/call_db.php');
 $requete='SELECT pseudo,profile_picture FROM users WHERE pseudo LIKE \'%' . $_POST['pulseur'] . '%\'';
 $sucess=mysql_query($requete) or die(mysql_error());
 While ($resultats=mysql_fetch_assoc($sucess))
	{
		echo"<section id='photos'>";
			if( isset($_SESSION['pseudo']) && $resultats['pseudo'] == $_SESSION['pseudo'])
			{
				
			}
			else
			{
				if (empty($resultats['profile_picture']))
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
				echo"<div class='user_link'><a href='index.php?page=profile&pseudo=".$resultats['pseudo']."'>&nbsp;".$resultats['pseudo']."</a>&nbsp;</div>";
			}

		echo"</section>";
	}
?> 