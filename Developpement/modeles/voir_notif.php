<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	<title>Slideup Boxes</title>
	<link rel='stylesheet' href='design/notif.css'>

	
	<style>
		.slide-up-boxes a { 
			display: block; 
			height: 130px; 
			margin: 0 0 20px 0; // espace en
			background: rgba(215, 215, 215); 
			border: 1px solid #ccc; 
			height: 60px; 
			overflow: hidden; 
		
		}
		
		.slide-up-boxes h5 {
			background-position:repeat;
			color: #333; 
			text-align: center;
			height: 35px; 
			font: italic 18px Georgia, Serif;    /* Vertically center text by making line height equal to height */
			 //opacity: 1;
			 -webkit-transition: all 0.2s linear; 
			 -moz-transition: all 0.2s linear; 
			 -o-transition: all 0.2s linear;
		}
		
		.slide-up-boxes a:hover h5 { 
			margin-top: -65px; 
			opacity: 0; 
		}
		
		.slide-up-boxes div { 
		
			position: relative; 
			color: white; 
			font: 12px/15px Georgia, Serif;
			height: 70px; 
			padding: 10px; 
			opacity: 0; 
			-webkit-transform: rotate(6deg); 
			-webkit-transition: all 0.4s linear; 
			-moz-transform: rotate(6deg); 
			-moz-transition: all 0.4s linear; 
			-o-transform: rotate(6deg); 
			-o-transition: all 0.4s linear; 
		}
		.slide-up-boxes a:hover div { 
			opacity: 1; 
			-webkit-transform: rotate(0); 
			-moz-transform: rotate(0); 
			-o-transform: rotate(0); 
		}
		.slide-up-boxes div { background: grey;  17px 17px no-repeat; padding-left: 120px; }
		//.slide-up-boxes   div  { background: #367db2 url(images/diw.png) 21px 10px no-repeat; padding-left: 90px; }
		//.slide-up-boxes a:nth-child(3) div { background: #393838 url(images/qod.png) 14px 16px no-repeat; padding-left: 133px; }
	</style>
</head>
<body>


<div id="page-wrap">
﻿<?php

	if(isset($_GET['delete_notif'])) 
	{
		$requete="DELETE FROM notification WHERE id_comment = ".$_GET['delete_notif']."";
		$sucess=mysql_query($requete) or die(mysql_error());
		echo "la notification a bien été supprimée";
	}

	$read_confirm='1';
	include('/../modeles/call_db.php');
	include('/../modeles/couperChaine.php');

	$request2 ="SELECT id_comment,type_de_notif FROM notification";
	
	$data2 = mysql_query($request2);
	
	if($data2 === false)	
	{
		echo "La requête est incorrect<br />".htmlentities($request2).'<br />'.mysql_error();
		return;
	}

	while($toto = mysql_fetch_array($data2))
	{
		$id=$toto['id_comment'];
		if($toto['type_de_notif'] == 1)
		{
		
			$requete = "SELECT * FROM notification N
			NATURAL JOIN USERS
			JOIN comments C ON C.id_comment = N.id_comment
			WHERE N.id_user != ".$_SESSION['id_user']." 
			AND N.id_pulseur =".$_SESSION['id_user']." AND  N.id_comment=".$id." AND type_de_notif = 1 ORDER BY N.date_notif DESC";
		}
		else
		{
			$requete = "SELECT * FROM notification N
			NATURAL JOIN USERS
			JOIN comment_a_comment CAC ON CAC.id_comment = N.id_comment
			WHERE N.id_user != ".$_SESSION['id_user']." 
			AND N.id_pulseur =".$_SESSION['id_user']." AND N.id_comment=".$id." AND type_de_notif = 2 ORDER BY N.date_notif DESC";
		}
		
	$data = mysql_query($requete);
	
	if($data === false)	
	{
		
		echo "La requête est incorrect<br />".htmlentities($requete).'<br />'.mysql_error();
		return;
		
	}

	$result = mysql_fetch_array($data);
	$nb_notif= mysql_num_rows($data);
	if ($nb_notif != 0)
	{
	/* ENLEVER DE COMMENTAIRE POUR DEBUGGER
	if($result === false)
	{	
	die('En fait, la requête est vide, il ny a pas de resultat');
	}*/

		echo'<section class="slide-up-boxes">';


		
		if($result['read_confirm'] == 0)
		{

			echo"<a style='background-color:#8bb8c6;' href='index.php?page=view_article&id_post=".$result['id_post']."&read_confirm=".$read_confirm."&id_comment=".$result['id_comment']."'>"; ?>
			<h5>
			<?php
		
			if($result['type_de_notif']== 1)
			{
			echo "".$result['pseudo']." a commenté votre post!" ;
			//echo '<style= background-position:right '.$result['
			}
			else
			{
			echo"".$result['pseudo']." a répondu a votre commentaire! ";
			}
			echo"</h5>";?>
			<div>	
				<style class=\"userbox\" style=\" width: 10px; height: 10px;  z-index: 1; position:relative; display:inline-block; border-width: 1px; border-color: green; border-style: dashed;">
		
			<?php
			if (empty($result['profile_picture']))
			{
				echo"<img src='design/img/exemple_profile.jpg'/> style=\"position: relative; top: 15px; width: 10px; height: 10px;height: 1%; z-index: 1;\" />";
			}
			else
			{
			
				$image = imagecreatefromstring($result['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
	
			}
			
				echo"<div class='user_link' style=\"position: right;widht:10px bottom: 5px; left: 5px; z-index: 2; border: none !important;\"/></style>";
			
			$chaine = $result['content'];
			couperChaine($chaine,10);
			$chaineNouvelle=couperChaine($chaine,10);
			echo $chaineNouvelle;
			?>
			</div>

			</a>
			<?php
	
	
		}		
		else
		{
			
			echo"<a style='background-color:#d5e5ea;' href='index.php?page=view_article&id_post=".$result['id_post']."&read_confirm=".$read_confirm."&id_comment=".$result['id_comment']."'>"; ?>
			<h5>
			<?php
			if($result['type_de_notif'] == 1)
			{
				echo "".$result['pseudo']." a commenté votre post!" ;
			}
			else
			{
				echo"".$result['pseudo']." a répondu a votre commentaire!";
			}
		
			echo"</h5>";?>
			<div>	
				<style class=\"userbox\" style=\" width: 10px; height: 10px;  z-index: 1; position:relative; display:inline-block; border-width: 1px; border-color: green; border-style: dashed;">
		
			<?php
			if (empty($result['profile_picture']))
			{
				echo"<img src='design/img/exemple_profile.jpg'/> style=\"position: relative; top: 15px; width: 10px; height: 10px;height: 1%; z-index: 1;\" />";
			}
			else
			{
			
				$image = imagecreatefromstring($result['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
	
			}
			
				echo"<div class='user_link' style=\"position: right;widht:10px bottom: 5px; left: 5px; z-index: 2; border: none !important;\"/></style>";
			
				$chaine = $result['content'];
				couperChaine($chaine,10);
				$chaineNouvelle=couperChaine($chaine,10);
				echo $chaineNouvelle;
				
				echo'</div></a>';
		}
	}
	
	}
?>

			
	</div>
</body>
</html>
