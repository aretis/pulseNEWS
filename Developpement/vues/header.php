<!DOCTYPE html>
<html lang="fr">

<html>
<link rel="stylesheet" href="design/style.css" />
<link rel="icon" type="image/gif" href="favicon.gif" />
<head>
	<title>pulseNEWS, sponsored by your mind!</title>
</head>
<body>
<div class='header'>
	<table cellspacing="0">
		<td>
				<img style='height: 75px;' src='design/img/logo_header.png'/>
				
		</td>
		<td style='width: 100%;'>
		</td>
		<td>
				<div class='header_info'>
					Recherche:
					<input name="search" value='Votre recherche'/>
					
					<?php
						if( isset($_SESSION['pseudo'] ))
						{
							echo "Bonjour, ".$_SESSION['pseudo']." !  ";
							echo "<a href='index.php?page=disconnect' style='color: white;'>(se déconnecter)</a>";
						}
						else
						{													
							echo "<a href='index.php?page=register' style='color: white;'>s'inscrire !</a><br>";
						}
					?>
					<div class='header_menu'>
						<a href='index.php?page=news'>fil d'actualités</a>&nbsp;&nbsp;
						<a href=''>débat du jour</a>&nbsp;&nbsp;
						<?php if( isset($_SESSION['pseudo'] ))
							{
								echo"<a href='index.php?page=profile'>".$_SESSION['pseudo']."</a>&nbsp;&nbsp;";
							}
							else
							{
								echo"<a href='index.php?page=connect' style='color: white;'>se connecter</a>&nbsp;&nbsp;";
							}
						?>
					</div>
				</div>
		</td>
	</table>
</div>
<br><br><br><br>