﻿
<?php	

// SYSTEME DE COMMENTAIRE ------- /////////////
	if(isset($_GET['delete_comment'])) include('modeles/delete_comment.php');

	else if(isset($_GET['delete_comment_of_comment'])) include('modeles/delete_comment_of_comment.php');

	if(isset($_GET['delete_post'])) include('modeles/delete_post.php');

	include('modeles/pulse.php');

	if(isset($_POST['comment']))
	{
		include('modeles/save_comment.php');
		save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['comment']);
	}
	else if(isset($_POST['comment_a_comment']))
	{	
		include('modeles/save_comment_comment.php');
		save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['id_parent'], $_POST['comment_a_comment']);
	}


	if(isset($_GET['PROpulse']))
	{

		pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['PROpulse']);
	}
	else if(isset($_GET['DEpulse']))
	{

		pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['DEpulse']);
	}

	include('modeles/connect_db.php');
		mysql_query("SET NAMES 'utf8'");
		if(isset($_SESSION['pseudo']))
		{
			$pseudo = $_SESSION['pseudo'];
			$req = mysql_query("SELECT * FROM users WHERE pseudo='".$pseudo."'");
			$req2 = mysql_fetch_assoc($req);
			$pseudo = $req2['pseudo'];
			$id_user = $req2['id_user'];
			$surname = $req2['surname'];
			$mail = $req2['mail'];
			$area_name = $req2['area_name'];
			$firstname = $req2['firstname'];
			$about = $req2['about'];
			$humor = $req2['humor'];
		}
?>
<?php
	if(isset($_GET['pseudo']))
	{

		$query = "SELECT * FROM users WHERE pseudo ='".$_GET['pseudo']."'";
		$result = call_db($query);

		while($data = mysql_fetch_array($result))
		{
			$id_user = $data['id_user'];
			$visit_surname = $data['surname'];
			$visit_firstname = $data['firstname'];
			$visit_mail = $data['mail'];
			$visit_humor = $data['humor'];
			$visit_area_name = $data['area_name'];
			$visit_about = $data['about'];
		}
	}
	else
	{
		$id_user = $_SESSION['id_user'];
	}
?>
<div class='profile_ban'>
<?php

			$request = "SELECT cover_picture FROM users WHERE id_user = ".$id_user;

			$sucess = mysql_query ($request) or die (mysql_error ());
			$col = mysql_fetch_assoc($sucess);



			if(empty($col['cover_picture']))
			{
				echo"<img src='design/img/ban_exemple.png'/>";
			}
			else
			{
				$image = imagecreatefromstring($col['cover_picture']);
				ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
				imagejpeg($image, null, 80);
				$data = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($data)  . '" />';
			}

				?>
	<div class='humor'><?php if(isset($_GET['pseudo']))
							{
								echo $visit_humor;
							}
							else
							{
								echo $humor;
							} ?></div>
</div>
<table style='margin: auto; text-align: center; vertical-align: top;' cellpadding='0' cellspacing='0'>
<td>
<?php 
if(!isset($_GET['pseudo']))
{
echo"<td>
<a href='index.php?page=create_article'><div class='profile_button_right'>&nbsp;rédiger un article&nbsp;</div></a>
</td>";
}
?>
<td>&nbsp;&nbsp;
</td>
<td>
<div class='profile_name'>&nbsp;

<?php 
if(isset($_GET['pseudo']))
{
	echo $_GET['pseudo'];
}
else
{
	echo $_SESSION['pseudo'];
}
?>&nbsp;</div>
</td>
<td>&nbsp;&nbsp;
</td>
<td>
<?php 
if(!isset($_GET['pseudo']))
{
	echo"<a href='index.php?page=change_info'><div class='profile_button_left'>&nbsp;modifier mon profil&nbsp;</div></a>";
}
?>
</td>
</table>
<table><tr>
<td style='vertical-align: top;'>
<table cellpadding='0' cellspacing='0' class='rss_block'>
			<tr>
				<td>
					<div class='block_title'><?php 
							if(isset($_GET['pseudo']))
							{
								echo $_GET['pseudo'];
							}
							else
							{
								echo $_SESSION['pseudo'];
							}
							?></div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
				
				<?php

			$request = "SELECT profile_picture FROM users WHERE id_user = ".$id_user;

			$sucess = mysql_query ($request) or die (mysql_error());
			$col = mysql_fetch_assoc($sucess);
			if (empty($col['profile_picture']))
			{
				echo"<img src='design/img/exemple_profile.jpg'/>";
			}
			else
			{
				$image = imagecreatefromstring($col['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$data = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($data)  . '" />';
			}

				?>
					
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
			<td>
			<div class='block_title'>à propos de moi</div>
			</td>
			</tr>
			
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_about;
							}
							else
							{
								echo $about;
							}
					?>			
					</div>
				
				</td>
			</tr>
			
	</table>
	
</td>
<td style='width: 80%; vertical-align: top;'>
<?php

	if(isset($_GET['pseudo']))
	{
		$query = "SELECT id_user FROM users WHERE pseudo ='".$_GET['pseudo']."'";

		$result = call_db($query);

		$id = mysql_result($result,0);
		$req = view_article_user($id);

		include('modeles/show_posts.php');

	}
	else
	{
		$req = view_article_user($_SESSION['id_user']);
		include('modeles/show_posts.php');

	}
?>


</td>

<td style='vertical-align: top; '>

<table cellpadding='0' cellspacing='0' class='rss_block'>

			<tr>
				<td>
					<div class='block_title'>mon profil</div>
				</td>
			</tr>
			<tr><td><hr></td></hr>
			<tr>
				<td>
				<div class='block_content'>
					
						
					<strong>Pseudo: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $_GET['pseudo'];
							}
							else
							{
								echo $pseudo;
							}
					?><br><br>
					<strong>Nom: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_surname;
							}
							else
							{
								echo $surname;
							}
					?><br><br>
					<strong>Prénom: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_firstname;
							}
							else
							{
								echo $firstname;
							}
					?><br><br>
					<strong>Mail: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_mail;
							}
							else
							{
								echo $mail;
							}
					?><br><br>
					<strong>Région: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_area_name;
							}
							else
							{
								echo $area_name;
							}
					?>
					</div>
				</td>
			</tr>
			
			
</table>
</td></tr>
</table>
