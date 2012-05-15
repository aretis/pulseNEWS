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
					<a href='' style='color: white;'>(se déconnecter)</a><br><br>
					<div class='header_menu'>
						<a href='' style='color: white;'>fil d'actualités</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>débat du jour</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>mon profil</a>&nbsp;&nbsp;
					</div>
				</div>
		</td>
	</table>
</div>
<div class='news_sort'>
TOUS&nbsp;&nbsp;ma région&nbsp;&nbsp;membres&nbsp;&nbsp;politique&nbsp;&nbsp;économie&nbsp;&nbsp;sport&nbsp;&nbsp;culture&nbsp;&nbsp;faits divers
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
<td>
<table cellpadding='0' cellspacing='0' class='post_debates'>
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td class = 'size_date'>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td rowspan = '2'>     
		<div class='description'>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sagittis sodales enim, a venenatis metus malesuada in. Nulla sit amet sem metus, eu semper leo. Nam sed magna risus, quis lobortis nisi. Vestibulum sed lacus orci, id hendrerit diam. Cras at auctor quam. Nullam feugiat urna ac sem varius id auctor lacus bibendum. Nunc nec lectus magna, at feugiat sem. Praesent metus mauris, porta sed tempus scelerisque, auctor ut lacus. Etiam id dolor sit amet nulla ullamcorper placerat et ut massa. Aliquam sodales tellus vitae diam porttitor ultrices. In scelerisque magna in elit tincidunt at elementum ipsum bibendum. Nulla ut justo vel neque venenatis tincidunt. Nullam quis urna et leo feugiat tristique. Nunc tincidunt condimentum tellus, vel sagittis ante vehicula rhoncus. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>
<tr>
	<td>
		&nbsp;
	</td>
</tr>
	

</tr>
<tr>
<td>
<a href=''><div class='comment_button'>débattre</div></a>
<div style='float: right; width: 5%px;'>&nbsp;</div>
<a href=''><div class='rate_button'>DEpulse!</div></a>
<div style='float: right; width: 5%px;'>&nbsp;</div>
<a href=''><div class='rate_button'>PROpulse!</div></a>
</td>
</tr>
</table>


	</table>
</div>

<table>
<td>
	<div class='rss_block'>
		<table>
			
		</table>
	</div>
</td>
<td>
<table cellpadding='0' cellspacing='0' class='comment_debates'>
<tr style='height: 32px;'>
	<td rowspan='1'>
		<div class='title_comment'>
			&nbsp;hih'
		</div>
	</td>
	<td style='height: 32px rowspan='1'>
		<div class='title_comment'>
			&nbsp;
		</div>
	</td>
	<td style='background-color: white;'>
		<div class='date_comments'>
			Aujourd'hui à 9h15
		</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td class= 'size'>
		<?php
		include('../modeles/apercu.php');
		$id=19;
		afficher_image($id);
		?>
	</td>
	<td style= 'background-color: #85c630;'  rowspan = '2'>
	<div class='description_comment'>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sagittis sodales enim, a venenatis metus malesuada in. Nulla sit amet sem metus, eu semper leo. Nam sed magna risus, quis lobortis nisi. Vestibulum sed lacus orci, id hendrerit diam. Cras at auctor quam. Nullam feugiat urna ac sem varius id auctor lacus bibendum. Nunc nec lectus magna, at feugiat sem. Praesent metus mauris, porta sed tempus scelerisque, auctor ut lacus. Etiam id dolor sit amet nulla ullamcorper placerat et ut massa. Aliquam sodales tellus vitae diam porttitor ultrices. In scelerisque magna in elit tincidunt at elementum ipsum bibendum. Nulla ut justo vel neque venenatis tincidunt. Nullam quis urna et leo feugiat tristique. Nunc tincidunt condimentum tellus, vel sagittis ante vehicula rhoncus. 
	</div>
	</td>
</tr>
<tr>
	<td style= 'background-color: #85c630;'>&nbsp;</td>
</tr>
</tr>
		

<tr>
<td>
	</td>
	<td>
<a href=''><div class='comment_button'>débattre</div></a>
<div style='float: right; width: 5%px;'>&nbsp;</div>

</td>
</tr>
</table>
</body>
</html>
</body>
</html>