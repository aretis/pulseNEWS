<?php

include ('/../modeles/profile_print.php');
include ('/../modeles/call_db.php');
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
		$humor = $req2[7];
		
		
		/*print_profile($key,$pseudo, $surname , $firstname ,$mail , $area_name , $about);*/
?>
<?php if(isset($_POST['about_me'])) 
{
$id_user = 3;
	echo " Vos informations ont bien été modifiés !";
	$query = 'UPDATE users SET about = "'.$_POST['about_me'].'" WHERE id_user = '.$id_user;
	if ( !mysql_query($query)) echo"La requete n'a pas aboutie";
}?>
<?php if(isset($_POST['humor'])) 
{
$id_user = 3;
	echo " Vos informations ont bien été modifiés !";
	$query = 'UPDATE users SET about = "'.$_POST['humor'].'" WHERE id_user = '.$id_user;
	if ( !mysql_query($query)) echo"La requete n'a pas aboutie";
}?>

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
<tr style='background-color: #85c630;'>
	<td>
		<div class='change_about_me'>
		<form action='index.php?page=change_info' method='post'>
		<br><input id='about' type='text' name ='about_me' VALUE ='function '><br>
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
		<br><input id='humor' type='text' name ='humeur' VALUE ='<?php if(isset($_POST['humor'])) echo $_POST['humor']; ?>'><br>
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