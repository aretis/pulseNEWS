<?php

include ('/../modeles/profile_print.php');
include ('/../modeles/call_db.php');
	$connect = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		
		mysql_select_db("pulsenews");?>
		<?php if(isset($_POST['about_me'])) 
{
$id_user = 3;
	echo " Vos informations ont bien été modifiés !";
	$query = 'UPDATE users SET about = "'.$_POST['about_me'].'" WHERE id_user = '.$id_user;
	if ( !mysql_query($query)) echo"La requete n'a pas aboutie";
}?>
<?php if(isset($_POST['humeur'])) 
{
$id_user = 3;
echo $_POST['humeur'];
	echo " Vos informations ont bien été modifiés !";
	$query = 'UPDATE users SET humor = "'.$_POST['humeur'].'" WHERE id_user = '.$id_user;
	if ( !mysql_query($query)) echo"La requete n'a pas aboutie";
}?>
<?php
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