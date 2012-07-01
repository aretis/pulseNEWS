<?php
	include ('/../modeles/change_info.php');
?>



<div id="wrapper" style='width: 768px'>

		<div class="accordionButton3"><div class='block_title'>image de couverture</div></div>
		<div class="accordionContent3">
			<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='cover_picture' size='10'/><input type='submit' value='upload!'/></form>
		</div>
	
<div class="accordionButton3"><div class='block_title'>image de profil</div></div>
		<div class="accordionContent3">
	
			<form action='index.php?page=change_info' method='post' enctype="multipart/form-data"><input type='file' name='profile_picture' size='10'/><input type='submit' value='upload!'/></form>
</div>
	<div class="accordionButton3"><div class='block_title'>à propos de moi</div></div>
		<div class="accordionContent3">
			<form action='index.php?page=change_info' method='post'>
			<br><input id='about' type='text' name ='about_me' ><br>
			<input type="submit" name="about" value=" Envois "/>
			</form>
		</div>
	

	<div class="accordionButton3"><div class='block_title'>mon humeur</div></div>
		<div class="accordionContent3">
			<form action='index.php?page=change_info' method='post'>
				<br><input id='humor' type='text' name ='humeur'><br>
				<input type="submit" name="humor" value=" Envois  "/>
				</form>
		</div>
</div>
