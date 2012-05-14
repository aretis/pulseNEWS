<?php

	include('modeles/pulse.php');
	
	if(isset($_POST['PROpulse']))
	{
		pulse($_POST['id_news'], $_SESSION['id_user'], $_POST['PROpulse'], $_POST['type']);
	}
	else if(isset($_POST['DEpulse']))
	{
		pulse($_POST['id_news'], $_SESSION['id_user'], $_POST['DEpulse'], $_POST['type']);
	}

	$connect = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		mysql_select_db("pulsenews");
		mysql_query("SET NAMES 'utf8'");
		$pseudo = $_SESSION['pseudo'];
		$req = mysql_query("SELECT * FROM users WHERE pseudo='$pseudo'");
		$req2 = mysql_fetch_row($req);
		$pseudo = $req2[1];
		$key = $req2[0];
		$surname = $req2[3];
		$mail = $req2[5];
		$area_name = $req2[7];
		$firstname = $req2[4];
		$about = $req2[6];
		
		/*print_profile($key,$pseudo, $surname , $firstname ,$mail , $area_name , $about);*/
?>
<div class='profile_ban'>
	<img src='design/img/ban_exemple.png'/>
</div>
<table style='margin: auto; text-align: center;' cellpadding='0' cellspacing='0'>
<td>
<td>
<a href='index.php?page=create_article'><div class='profile_button_right'>&nbsp;rédiger un article&nbsp;</div></a>
</td>
<td>&nbsp;&nbsp;
</td>
<td>
<div class='profile_name'>&nbsp;<?php echo $pseudo;?>&nbsp;</div>
</td>
<td>&nbsp;&nbsp;
</td>
<td>
<div class='profile_button_left'>&nbsp;modifier mon profil&nbsp;</div>

</td>
</table>
<table>
<td style='vertical-align: top;'>
<table cellpadding='0' cellspacing='0' class='about_block'>
			
			<tr>
				<td>
					<img src='design/img/exemple_profile.jpg'/>
				</td>
			</tr>

			<tr>
				<td>
					<div class='block_title_about'>&nbsp;à propos de moi</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php echo $about; ?> 				
					</div>
				</td>
			</tr>
			<tr style='height: 100%;'>
			</tr>
	</table>
</td>
<td style='width: 80%;'>
<?php

		$req = view_article_user(1);

		while($data = mysql_fetch_assoc($req))
		{
		
		
		$content = $data['content'];
	
		echo"<table cellpadding='0' cellspacing='0' class='article'>";
		echo"<tr style='height: 10px;'>";
		echo"	<td rowspan='1'>";
		echo"	<div class='title_post'>";
		echo"		&nbsp;".$data['title'];
		echo"	</div>";
		echo"	</td>";
		echo"";
		echo"	<td>";
		echo"		<div class='rate'>";
		if($data['rate'] > 0) echo" + "; 
		if($data['rate'] < 0) echo" - "; 
		echo $data['rate']."</div>";
		echo"	</td>";
		echo"</tr>";
		echo"<tr style='background-color: #85c630;'>";
		echo"	<td>";
		echo"		<div class='article_content'>";
		echo"<p>";
		echo $data['description'];
		echo"</p>";
		
		$id = $data['id_post'];

	
		$request = "SELECT picture_id, picture_type, picture_blob FROM pictures WHERE post_id = $id";

		$sucess = mysql_query ($request) or die (mysql_error ());
		$col = mysql_fetch_assoc($sucess);
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
				echo '<br><img src="data:image/jpg;base64,' .  base64_encode($data)  . '" /><br>';
			}
			
		$content = nl2br( $content , false );
		echo $content;
		echo"		</div>";
		echo"	</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>";
		echo"	<div class='debate'><form action='index.php?page=profile' method='POST'/><input type='submit' name='debattre' value='debattre' /></form></div>";
		echo"	<div class='depulse'>&nbsp;";
		echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
		echo"	<div class='propulse'>&nbsp;";
		echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
		echo"</td>";
		echo"</tr>";
		echo"<tr style='height: 30px;'>";
		echo"</tr>";
		echo"</table>";
	}
?>

<?php

	$query = 'SELECT * FROM news WHERE id_user ='.$_SESSION['id_user'];
	$result = call_db($query);
	
	while($data = mysql_fetch_array($result))
	{

		echo"<table cellpadding='0' cellspacing='0' class='article'>";
		echo"<tr style='height: 10px;'>";
		echo"	<td rowspan='1'>";
		echo"	<div class='title_post'>";
		echo"Short news : ".$data['cat']." !";
		echo"	</div>";
		echo"	</td>";
		echo"";
		echo"	<td>";
		echo"		<div class='rate'>";
		if($data['rate'] > 0) echo" + "; 
		if($data['rate'] < 0) echo" - ";
		echo $data['rate'];
		echo "</div>";
		echo"	</td>";
		echo"</tr>";
		echo"<tr style='background-color: #85c630;'>";
		echo"	<td>";
		echo"		<div class='article_content'>";
		echo"<p>";
		echo $data['news_layout'];
		echo"</p>";
		echo"<p>";
		echo"Lien : ".$data['link'];
		echo"</p>";
		echo"		</div>";
		echo"	</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>";
		echo"	<div class='rate_button'><form action='index.php?page=profile' method='POST'/><input type='submit' name='debattre' value='debattre' /></form></div>";
		echo"	<div style='float: right; width: 5%px;'>&nbsp;</div>";
		echo"	<div class='rate_button'><form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='news' /><input type='hidden' name='id_news' value='".$data['id_news']."' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div>";
		echo"	<div style='float: right; width: 5%px;'>&nbsp;</div>";
		echo"	<div class='rate_button'><form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='news' /><input type='hidden' name='id_news' value='".$data['id_news']."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div>";
		echo"</td>";
		echo"</tr>";
		echo"<tr style='height: 30px;'>";
		echo"</tr>";
		echo"</table>";

		
	}
?>
</td>

<td style='vertical-align: top; '>

<table cellpadding='0' cellspacing='0' class='profile_block'>

			<tr>
				<td>
					<div class='block_title'>&nbsp;mon profil</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
				<div class='block_content'>
					<?php
						
						?>
					<strong>Pseudo: </strong><?php echo $pseudo;?><br>
					<strong>Nom: </strong><?php echo $surname;?><br>
					<strong>Prénom: </strong><?php echo $firstname; ?><br>	
					<strong>Mail: </strong><?php echo $mail; ?><br>
					<strong>Région: </strong><?php echo $area_name; ?><br>
					</div>
				</td>
			</tr>
			<tr style='height: 100%'>
			</tr>
</table>
</td>

</table>