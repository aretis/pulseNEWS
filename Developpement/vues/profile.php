<?php

include ('/../modeles/profile_print.php');
	$connect = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		mysql_select_db("pulsenews");
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
		
		print_profile($key,$pseudo, $surname , $firstname ,$mail , $area_name , $about);
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
<div class='profile_name'>&nbsp;<?php echo $pseudo;?>&nbsp;
</td>
<td>
<div class='profile_button_left'>&nbsp;modifier mon profil&nbsp;</div>

</td>
</table>
<table>
<td>
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
<td>
<table cellpadding='0' cellspacing='0' class='article'>
<tr style='height: 10px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='article_content'>
		<br><img src='design/img/exemple_article.jpg'/><br>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>
</tr>
<tr>
<td>
	<a href=''><div class='comment_button'>débattre</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>DEpulse!</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>PROpulse!</div></a>
</td>
</tr>
<tr style='height: 100%'>
</tr>
</table>
</td>

<td>

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