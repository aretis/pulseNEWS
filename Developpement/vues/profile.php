<link rel="stylesheet" href="design/profil.css" />


<?php	

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
		$req2 = mysql_fetch_row($req);
		$pseudo = $req2[1];
		$key = $req2[0];
		$surname = $req2[3];
		$mail = $req2[5];
		$area_name = $req2[8];
		$firstname = $req2[4];
		$about = $req2[6];
		$humor = $req[7];
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
			$visit_surname = $data['surname'];
			$visit_firstname = $data['firstname'];
			$visit_mail = $data['mail'];
			$visit_humor = $data['humor'];
			$visit_area_name = $data['area_name'];
			$visit_about = $data['about'];
		}
	}
?>
<div class='profile_ban'>
	<img src='design/img/ban_exemple.png'/>
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
					<?php if(isset($_GET['pseudo']))
							{
								echo $visit_humor;
							}
							else
							{
								echo $humor;
							}
					?><br>
					</div>
				</td>
			</tr>
			<tr style='height: 100%'>
			</tr>
</table>
</td>

</table>