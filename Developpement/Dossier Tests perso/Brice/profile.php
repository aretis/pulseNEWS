﻿<?php
include(dirname(__FILE__).'/../vues/header.php');
include(dirname(__FILE__).'/../vues/profile.php');
?>
<?php
	$pseudo='aretis';
	$surname='hoffmann';
	$firstname='brice';
	$area_name='ile de france';
	$about='Je suis un étudiant en informatique et je fais un essai de l\'affichage de la page profile.php';
	$mail='hoffmann@intechinfo.fr';
	?>
<div class='deco'>&nbsp;&nbsp;</div>
<br>
<div class='profile_ban'>
	<img src='design/img/ban_exemple.png'/>
</div>
<table style='margin: auto; text-align: center;' cellpadding='0' cellspacing='0'>
<td>
<td>
<div class='profile_button_right'>&nbsp;rédiger un article&nbsp;</div>
</td>
<td>&nbsp;&nbsp;
</td>
<td>
<div class='profile_name'>&nbsp;Mich'Mich'&nbsp;</div>
</td>
<td>&nbsp;&nbsp;
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
					<div class='block_title_about'>&nbsp;a propos de moi</div>
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