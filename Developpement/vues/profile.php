﻿<link rel="stylesheet" href="design/profil.css" />


<?php	

	$user=$_SESSION['id_user'];
	include('connexion.php');
	include('/../modeles/couperChaine.php');
	$query = "SELECT id_pulseur, count(id_pulseur) AS nb_notif FROM notification WHERE  id_pulseur = ".$_SESSION['id_user']." AND id_user != ".$_SESSION['id_user']." AND read_confirm='0'";
	if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
	$sucess= mysql_query($query) or die (mysql_error());
	while($resultats=mysql_fetch_assoc($sucess))
	{

	echo"  <div class='block_title'&nbsp;> <a href= index.php?page=voir_notif >vous avez ".$resultats['nb_notif']." notifications! </a></div>";

/*	$requete="SELECT * FROM notification N JOIN comments C ON N.id_comment = C.id_comment JOIN users U ON C.id_user=U.id_user  WHERE N.id_user != ".$_SESSION['id_user']." AND read_confirm='0'" ;
	$sucess=mysql_query($requete) or die(mysql_error());
	While($resultats=mysql_fetch_array($sucess))
	{

	
    echo" <li>".$resultats['pseudo']." a commenter votre post ";
					$chaine = $resultats['content'];
					couperChaine($chaine,5);
					$chaineNouvelle=couperChaine($chaine,5);
					echo $chaineNouvelle;

	 
	 
	echo" </li>";
      }
	  
  echo"  </ul>
  </li>
</ul>";
	// <td>
					<div class='block_title'>&nbsp;vous avez ".$resultats['nb_notif']." notifications!</div>
	</td>";*/

	
	}



	if(isset($_GET['delete_comment'])) include('modeles/delete_comment.php');
	
	if(isset($_GET['delete_post'])) include('modeles/delete_post.php');
	
	include('modeles/pulse.php');
	
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
		if(isset($_SESSION['pseudo'])){
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
		/*print_profile($key,$pseudo, $surname , $firstname ,$mail , $area_name , $about);*/
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
	<div class='humor'>"<?php if(isset($_GET['pseudo']))
							{
								echo $visit_humor;
							}
							else
							{
								echo $humor;
							} ?>"</div>
</div>
<table style='margin: auto; text-align: center;' cellpadding='0' cellspacing='0'>
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
<table>
<td style='vertical-align: top;'>
<table cellpadding='0' cellspacing='0' class='about_block'>
			
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

			<tr>
				<td>
					<div class='block_title_about'>&nbsp;à propos de moi</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
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
			<tr style='height: 100%;'>
			</tr>
	</table>
</td>
<td style='width: 80%;'>
<?php
	
	if(isset($_GET['pseudo']))
	{
		$query = "SELECT id_user FROM users WHERE pseudo ='".$_GET['pseudo']."'";
		
		$result = call_db($query);
			
		$id = mysql_result($result, 0);
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

<table cellpadding='0' cellspacing='0' class='profile_block'>

			<tr>
				<td>
					<div class='block_title'>&nbsp;mon profil</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
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
					?><br>
					<strong>Nom: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_surname;
							}
							else
							{
								echo $surname;
							}
					?><br>
					<strong>Prénom: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_firstname;
							}
							else
							{
								echo $firstname;
							}
					?><br>
					<strong>Mail: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_mail;
							}
							else
							{
								echo $mail;
							}
					?><br>
					<strong>Région: </strong>
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_area_name;
							}
							else
							{
								echo $area_name;
							}
					?><br>
					<strong>Humeur : </strong>
					<?php 
					?><br>
					</div>
				</td>
			</tr>
			<tr style='height: 100%'>
			</tr>
</table>
</td>

</table>