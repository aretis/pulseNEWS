<?php
	include ('/../modeles/change_info.php');
?>



<table cellpadding='0' cellspacing='0' class='edit_profile'>
<tr style='height: 10px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;image de couverture
	</div>
	</td>
</tr>
<tr><td>
<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='cover_picture' size='10'/><input type='submit' value='upload!'/></form>
</td></tr>
<tr style='height: 10px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;image de profil
	</div>
	</td>
</tr>
<tr><td>

<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='profile_picture' size='10'/><input type='submit' value='upload!'/></form>
</td></tr>
<tr style='height: 10px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;à propos de moi
	</div>
	</td>
</tr>

<tr style='background-color: #58b54c;'>
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
		&nbsp;mon humeur:
	</div>
	</td>
</tr>

<tr style='background-color: #58b54c;'>
	<td>
		<div class='change_humor'>
		<form action='index.php?page=change_info' method='post'>
		<br><input id='humor' type='text' name ='humeur'><br>
		<input type="submit" name="humor" value=" Envois  "/>
		</form>
		</div>
	</td>
</tr>

</table>
