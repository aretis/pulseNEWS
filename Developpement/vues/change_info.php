<?php
	include ('/../modeles/change_info.php');
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
<table cellpadding='0' cellspacing='0' class='article'>
<tr style='height: 10px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Modifier mes infos : A propos de moi :
	</div>
	</td>
</tr>
<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='cover_picture' size='10'/><input type='submit' value='upload!'/></form>
<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='profile_picture' size='10'/><input type='submit' value='upload!'/></form>
<tr style='background-color: #85c630;'>
	<td>
		<div class='change_about_me'>
		<form action='index.php?page=change_info' method='post'>
		<br><input id='about' type='text' name ='about_me' ><br>
		<input type="submit" name="about" value=" Envois "/>
		</form>
		</div>
	</td>
</tr>
</br>
<tr style='height: 10px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Modifier mon humeur:
	</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='change_humor'>
		<form action='index.php?page=change_info' method='post'>
		<br><input id='humor' type='text' name ='humeur'><br>
		<input type="submit" name="humor" value=" Envois  "/>
		</form>
		</div>
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
					<strong>humeur: </strong><?php echo $humor; ?><br>
					</div>
				</td>
			</tr>
			<tr style='height: 100%'>
			</tr>
</table>


</td>
</table>