<!DOCTYPE html>
<html lang="fr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset='UTF-8'"/>
<link rel="stylesheet" href="design/style.css" />
<link rel="icon" type="image/gif" href="design/img/favicon.gif" />
<script src="js/modernizr.custom.80028.js"></script>
	<script src="js/jquery.backgroundPosition.js" type="text/javascript"></script>
	<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src='js/slotmachine.js'></script>
	    <script src="js/organictabs.jquery.js"></script>
    <script>
        $(function() {
    
            $("#example-one").organicTabs();
            
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
    </script>

	<script type="text/javascript">
		$(function(){
		
		  $('#midground').css({backgroundPosition: '0px 0px'});
		  $('#foreground').css({backgroundPosition: '0px 0px'});
		  $('#background').css({backgroundPosition: '0px 0px'});
		
			$('#midground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 240000, 'linear');
			
			$('#foreground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 120000, 'linear');
			
			$('#background').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 480000, 'linear');
			
		});
	</script>
	<title>pulseNEWS, sponsored by your mind!</title>
</head>
<body>


<?php



 include('modeles/connect_db.php'); ?>
<div class='header'>
	<table cellspacing="0">
		<td>
				<img style='height: 75px;' src='design/img/logo_header.png'/>			
		</td>
		<td style='width: 100%;'>
		</td>
		<td>
				<div class='header_info'>
					
					
					<?php

						if( isset($_SESSION['pseudo'] ))
						{
							echo "Bonjour, ".$_SESSION['pseudo']." !  ";
							echo "<a href='index.php?page=valid_user' style='color: white;'>modifier mon compte</a>&nbsp;&nbsp</a>";
							echo "<a href='index.php?page=news&disconnect=1' style='color: white;'>(se déconnecter)&nbsp;&nbsp&nbsp;&nbsp</a>&nbsp;&nbsp;<br>";
						}
						else
						{													
							echo "<a href='index.php?page=register' style='color: white;'>s'inscrire !</a>&nbsp;&nbsp;<br>";
						}
					
					echo"<div class='header_menu'>";
					
					
					if(isset($_SESSION['id_user']))
					{
					
						$user=$_SESSION['id_user'];
						include('/../modeles/connect_db.php');
						include('/../modeles/couperChaine.php');
						$query = "SELECT id_pulseur, count(id_pulseur) AS nb_notif FROM notification WHERE  id_pulseur = ".$_SESSION['id_user']." AND id_user != ".$_SESSION['id_user']." AND read_confirm='0'";
						if(!mysql_query($query) )
								{
									echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
									return;
								}
						$sucess= mysql_query($query) or die (mysql_error());
						while($resultats=mysql_fetch_assoc($sucess))
						{
						
							echo" <a href='index.php?page=voir_notif' >".$resultats['nb_notif']." <img style='margin-bottom: -5px;' src='design/img/notif_icon.png'/></a>";
							/*
							$requete="SELECT * FROM notification N JOIN comments C ON N.id_comment = C.id_comment JOIN users U ON C.id_user=U.id_user  WHERE N.id_user != ".$_SESSION['id_user']." AND read_confirm='0'" ;
							$sucess=mysql_query($requete) or die(mysql_error());
							While($resultats=mysql_fetch_array($sucess))
							{

							
							echo" <li>".$resultats['pseudo']." a commenté votre post ";
							$chaine_nouvelle=couperChaine($resultats['content'],10);
							echo $chaine_nouvelle;
							 
							 
							
							  }
							  
							<td>
											<div class='block_title'>&nbsp;vous avez ".$resultats['nb_notif']." notifications!</div>
							</td>";*/

						
						}
					}
			?>		
					
					
					
					<a href='index.php?page=recherche'><img src='design/img/loupe.png'/>&nbsp;rechercher</a>&nbsp;&nbsp;
						<a href='index.php?page=newsfeed'>pulse !</a>&nbsp;&nbsp;
						<a href='index.php?page=list_users'>les pulseurs</a>&nbsp;&nbsp;
						<a href='index.php?page=news'>fil d'actualités</a>&nbsp;&nbsp;
						<a href='index.php?page=debate'>débat du jour</a>&nbsp;&nbsp;
						<?php if( isset($_SESSION['pseudo'] ))
							{
								echo"<a href='index.php?page=profile'>".$_SESSION['pseudo']."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							}
							else
							{
								echo"<a href='index.php?page=connect' style='color: white;'>se connecter</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							}
						?>
					</div>
				</div>
		</td>
	</table>
</div>

<br><br><br><br>