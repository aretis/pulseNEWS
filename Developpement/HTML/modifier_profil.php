<DOCTYPE html>
<html lang="fr">

<html>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="debate.css" />

<link rel="icon" type="image/gif" href="favicon.gif" />
<head>
	<title>pulseNEWS, sponsored by your mind!</title>
</head>
<body>
<div class='header'>
	<table cellspacing="0">
		<td>
				<img style='width: 451px;' src='img/logo_header.png'/>
				
		</td>
		<td style='width: 100%;'>
		</td>
		<td>
				<div class='header_info'>
					Recherche:
					<input name="search" value='Votre recherche'/>
					Bonjour, Mich'Mich'!<br>
					<a href='' style='color: white;'>(se d�connecter)</a><br><br>
					<div class='header_menu'>
						<a href='' style='color: white;'>fil d'actualit�s</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>d�bat du jour</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>mon profil</a>&nbsp;&nbsp;
					</div>
				</div>
		</td>
	</table>
</div>
<br>
<br>
<table>
<td>
	<div class='rss_block'>
		<table>
			
		</table>
	</div>
</td>

<table>
<td>
	<img source= 'moi.jpg'>
<td>

		<FORM action="upload.php" method="POST" ENCTYPE="multipart/form-data">
		<input type="hidden" name=\"max_file_size" value="50000">
		image:<input TYPE="file" NAME="image"><br>
		<INPUT TYPE="submit" NAME="upload" VALUE="envoyer">
		</form>