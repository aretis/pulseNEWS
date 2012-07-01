<div class='search_pulseur'>
	<form action='index.php?page=list_users' method='POST'>
		<div style='margin:auto; text-align:center; font-size:22px;'>Rechercher un pulseur :</div><br>
		&nbsp;&nbsp;<input type='search' name='pulseur' placeholder='recherche'>
		<div id='search_button'><input type='submit' name ='valider' value='Rechercher'></div>
	</form>
</div>
<br>


<?php	
	
	include('modeles/call_db.php');
	
	if(isset($_POST['valider']) && !empty($_POST['pulseur'])) $query="SELECT * FROM users WHERE pseudo LIKE '%".$_POST['pulseur']."%'";
	else $query = "SELECT * FROM users";
	$result = call_db($query);
	
	echo"<section style=\"font-size: 0;\">";
	while($data = mysql_fetch_array($result))
	{
		if( isset($_SESSION['pseudo']) && $data['pseudo'] == $_SESSION['pseudo'])
		{
			
		}
		else
		{
			echo "<div class=\"userbox\" style=\"width: 200px; height: 200px; position: relative; z-index: 1; display:inline-block;  \">\n";
			if (empty($data['profile_picture']))
			{
				echo"<img src='design/img/exemple_profile.jpg' style=\"position: absolute; top: 0; width: 100%; height: 100%; z-index: 1;\" />";
			}
			else
			{
				
				$image = imagecreatefromstring($data['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" style="position: absolute; top: 0; width: 100%; height: 100%; z-index: 1;" />';
			}
			echo"<div class='user_link' style=\"position: absolute; bottom: 5px; left: 5px; z-index: 2; border: none !important;\"><a href='index.php?page=profile&pseudo=".$data['pseudo']."'>&nbsp;".$data['pseudo']."</a>&nbsp;</div>";
			
			echo "\n</div>\n";
		}
	}
	
	
	echo"</section>";
	if(mysql_num_rows($result) == 0) echo"<div id='box' >Désolé, il n'existe pas de pulseur \" ".$_POST['pulseur']." \" </div>";
?>