﻿<link rel="stylesheet" href="design/profil.css" />


<?php	include('modeles/pulse.php');
	
	if(isset($_POST['comment']))
	{
		include('modeles/save_comment.php');
		save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['comment']);
	}
	
	
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
		$area_name = $req2[8];
		$firstname = $req2[4];
		$about = $req2[6];
		$humor = $req[7];
		
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
<a href='index.php?page=change_info'><div class='profile_button_left'>&nbsp;modifier mon profil&nbsp;</div></a>

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
	$req = view_article_user($_SESSION['id_user']);
	include('modeles/show_posts.php');
?>

<<<<<<< HEAD
=======

>>>>>>> b514f856c5892bfde32c76d272f88c9466c7f980
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
					<strong>Humeur : </strong><?php echo $humor; ?><br>
					</div>
				</td>
			</tr>
			<tr style='height: 100%'>
			</tr>
</table>
</td>

</table>