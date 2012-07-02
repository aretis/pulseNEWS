<?php
	include ('/../modeles/change_info.php');
?>



<br><br><br><div id="wrapper" style='width: 768px'>

		<div class="accordionButton3"><div class='block_title'>Image de couverture</div></div>
		<div class="accordionContent3">
			<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='cover_picture' size='10'/><input type='submit' value='upload!'/></form>
		</div><br><br><br>
	
<div class="accordionButton3"><div class='block_title'>Image de profil</div></div>
		<div class="accordionContent3">
	
			<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='profile_picture' size='10'/><input type='submit' value='upload!'/></form>
</div><br><br><br>
	<div class="accordionButton3"><div class='block_title'>A propos de moi</div></div>
		<div class="accordionContent3">
			<form action='index.php?page=change_info' method='post'>
			<br><input id='about' type='text' name ='about_me' size=105>
			<input type="submit" name="about" value=" Envois "/>
			</form>
		</div><br><br><br>
	

	<div class="accordionButton3"><div class='block_title'>Mon humeur</div></div>
		<div class="accordionContent3">
			<form action='index.php?page=change_info' method='post'>
				<br><input id='humor' type='text' name ='humeur' size=105>
				<input type="submit" name="humor" value=" Envois  "/>
				</form>
		</div>
</div>
