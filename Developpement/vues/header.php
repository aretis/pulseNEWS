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
				<img style='width: 451px;' src='design/img/logo_header.png'/>
				
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
							echo "Bonjour, ".$_SESSION['pseudo']." !<br><br>";
							echo "<a href='index.php?page=disconnect' style='color: white;'>(se déconnecter)</a>";
						}
						else
						{													
							echo "<a href='index.php?page=register' style='color: white;'>s'inscrire !</a><br><br>";
						}
					?>
					<div class='header_menu'>
						<a href='index.php?page=news' style='color: white;'>fil d'actualités</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>débat du jour</a>&nbsp;&nbsp;
						<?php if( isset($_SESSION['pseudo'] ))
							{
								echo"<a href='index.php?page=profile' style='color: white;'>".$_SESSION['pseudo']."</a>&nbsp;&nbsp;";
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