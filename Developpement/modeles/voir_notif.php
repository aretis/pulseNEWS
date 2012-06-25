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

	$query = "SELECT id_pulseur, count(id_pulseur) AS nb_notif FROM notification WHERE  id_pulseur = ".$_SESSION['id_user']." AND id_user != ".$_SESSION['id_user']." AND  read_confirm='0'";
	if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}

	$sucess= mysql_query($query) or die (mysql_error());
	while($resultats=mysql_fetch_assoc($sucess))
	{


		$requete=/*"SELECT * FROM notification N 
						JOIN comments C ON N.id_comment = C.id_comment 
						JOIN users U ON C.id_user=U.id_user 
						WHERE  N.id_user != ".$_SESSION['id_user']." 
						AND  id_pulseur =".$_SESSION['id_user']." ";*/
						
						//"SELECT * FROM notification



						"SELECT * FROM notification N 
						JOIN comments C ON N.id_comment = C.id_comment 
						JOIN users U ON C.id_user=U.id_user 
						WHERE N.id_user!=".$_SESSION['id_user']." 
						AND N.id_pulseur =".$_SESSION['id_user']." ORDER BY post_date DESC";
						//OR  N.id_user=".$_SESSION['id_user']."";
					

						
						/*AND WHERE N.id_post=(SELECT N.id_post FROM notification 
						WHERE N.id_user=".$_SESSION['id_user'].")
						ORDER BY post_date DESC ";*/
						
						//SELECT * FROM notification WHERE 
						/*UNION ALL  (SELECT content FROM comments C 
						JOIN notification N ON C.id_comment = N.id_comment
						WHERE N.id_post=(SELECT N.id_post FROM notification 
						WHERE N.id_user=".$_SESSION['id_user']."))
						ORDER BY post_date DESC ";*/
		$sucess=mysql_query($requete) or die(mysql_error());
		While($resultats=mysql_fetch_array($sucess))
		{
			
		?>	
		
			<section class="slide-up-boxes">
		<?php
		if($resultats['read_confirm']==0)
		{
<<<<<<< HEAD
			echo "coucou";
				echo"<a style='background-color:green' href='index.php?page=view_article&id_post=".$resultats['id_post']."&read_confirm=".$read_confirm."&id_comment=".$resultats['id_comment']."'>"; ?>
				<h5>
				<?php
	
				echo"<style= 'background-color:green'>";
			
				
				echo "".$resultats['pseudo']." a commenté votre post! </h5>";
				echo"<div>";
				
				echo" <div class=\"userbox\" style=\"width: 10px; height: 10px; position: relative; z-index: 1; display:inline-block; border-width: 1px; border-color: green; border-style: dashed;\">\n";
				echo"loooooooool";
=======
		echo"<a style='background-color:#8bb8c6;' href='index.php?page=view_article&id_post=".$resultats['id_post']."&read_confirm=".$read_confirm."&id_comment=".$resultats['id_comment']."'>"; ?>
				<h5>
				<?php
			
				
				echo "".$resultats['pseudo']." a commenté votre post!" ;
				echo"</h5>";?>
			<div>	
					<style class=\"userbox\" style=\" width: 10px; height: 10px;  z-index: 1; position:relative; display:inline-block; border-width: 1px; border-color: green; border-style: dashed;">
			
				<?php
>>>>>>> 2b1b8aaf08aa34299377a83148d6a8163a894cd0
				if (empty($resultats['profile_picture']))
				{
					echo"<img src='design/img/exemple_profile.jpg'/> style=\"position: relative; top: 15px; width: 10px; height: 10px;height: 1%; z-index: 1;\" />";
				}
				else
				{
				
					$image = imagecreatefromstring($resultats['profile_picture']);
					ob_start();
					imagejpeg($image, null, 80);
					$img = ob_get_contents();
					ob_end_clean();
					echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
		
				}
				
<<<<<<< HEAD
				echo"<div><style> slide-up-boxes div { background: grey;  17px 17px no-repeat; padding-left: 120px; } </style>";
				echo"<div class='user_link' style=\"position: absolute; bottom: 5px; left: 5px; z-index: 2; border: none !important;\">";
=======
					echo"<div class='user_link' style=\"position: right;widht:10px bottom: 5px; left: 5px; z-index: 2; border: none !important;\"/></style>";
				
>>>>>>> 2b1b8aaf08aa34299377a83148d6a8163a894cd0
				$chaine = $resultats['content'];
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
				echo"coucou toi lol lol ";
				echo"<a style='background-color:#85C630;' href='index.php?page=view_article&id_post=".$resultats['id_post']."&read_confirm=".$read_confirm."&id_comment=".$resultats['id_comment']."'>"; ?>
				<h5>
				<?php
			
				
<<<<<<< HEAD
=======
				echo"<a style='background-color:#d5e5ea;' href='index.php?page=view_article&id_post=".$resultats['id_post']."&read_confirm=".$read_confirm."&id_comment=".$resultats['id_comment']."'>"; ?>
				<h5>
				<?php
			
				
>>>>>>> 2b1b8aaf08aa34299377a83148d6a8163a894cd0
				echo "".$resultats['pseudo']." a commenté votre post!" ;
				echo"</h5>";?>
			<div>	
					<style class=\"userbox\" style=\" width: 10px; height: 10px;  z-index: 1; position:relative; display:inline-block; border-width: 1px; border-color: green; border-style: dashed;">
			
				<?php
				if (empty($resultats['profile_picture']))
				{
					echo"<img src='design/img/exemple_profile.jpg'/> style=\"position: relative; top: 15px; width: 10px; height: 10px;height: 1%; z-index: 1;\" />";
				}
				else
				{
				
					$image = imagecreatefromstring($resultats['profile_picture']);
					ob_start();
					imagejpeg($image, null, 80);
					$img = ob_get_contents();
					ob_end_clean();
					echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
		
				}
				
					echo"<div class='user_link' style=\"position: right;widht:10px bottom: 5px; left: 5px; z-index: 2; border: none !important;\"/></style>";
				
				$chaine = $resultats['content'];
				couperChaine($chaine,10);
				$chaineNouvelle=couperChaine($chaine,10);
				echo $chaineNouvelle;
				?>
		</div>
	
			</a>
			<?php
			}

			
	/*		echo" <br> <br> 
	
	<table width = 60% class='post_news' cellspading='0' >
	<tr style='height: 12px'width=60%>

		</tr>
		<tr style='background-color: #85c630;'>

		<td>";
			if ($resultats['read_confirm']==1)
			{
			echo"<div class='description'>";
			}
			else 
			echo"<div class='description_notif'>";
		echo  $resultats['pseudo'] . " &nbsp; a commenté votre post:</br>";
		$chaine = $resultats['content'];
		couperChaine($chaine,10);
		$chaineNouvelle=couperChaine($chaine,10);
		echo $chaineNouvelle;
		echo"</div>
		contenu

		</td>
		</div>
		</td>
			<td style='background-color: white;'>
		<div class='date_notif'>
		date
		</div>
		
		</td>
		<td>
		<a href='index.php?page=voir_notif&delete_notif=".$resultats['id_comment']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X</a>&nbsp;&nbsp;
		</td>

	</tr>
	<tr>
	<td>
		<a href='index.php?page=view_article&id_post=".$resultats['id_post']."&read_confirm=".$read_confirm."&id_comment=".$resultats['id_comment']."'><div class='comment_button'>voir</div></a>
		<div style='float: right; width: 5%px;'>&nbsp;</div>
	</td>
	</tr>
	</table>
	<br>"; 

		}		
		
		
		
			/*echo"
			<tr>
			<td>
			 ".$resultats['pseudo']." a commenter votre post ".$resultats['content']." 
			 
			</tr>
			</td>";*/
		}

	}
?>

			
	</div>
</body>
</html>
