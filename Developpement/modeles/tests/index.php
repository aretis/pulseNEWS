<DOCTYPE html>
<html lang="fr">
<html>
<link rel="stylesheet" href="style.css" />
<link rel="icon" type="image/gif" href="favicon.gif" />
<head>
	<title>pulseNEWS, sponsored by your mind!</title>
</head>
<?php
	require_once("rsslib.php");
?>
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
<table cellpadding='0' cellspacing='0' class='rss_block'>

			<tr>
				<td>
					<div class='block_title'>&nbsp;politique</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php
					$url= 'http://news.google.fr/news?pz=1&cf=all&ned=fr&hl=fr&output=rss';

					echo RSS_display($url, 3);		
					?>
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
			<tr>
				<td>
					<div class='block_title'>&nbsp;économie</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php
					$url= 'http://news.google.fr/news?pz=1&cf=all&ned=fr&hl=fr&topic=b&output=rss';

					echo RSS_display($url, 3);		
					?>
					
					</div>
				</td>
			</tr>
</table>

</td>
<td>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

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
<br>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

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
<br>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

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
<br>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

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
</td>
<td>
	<table cellpadding='0' cellspacing='0' class='rss_block'>

			<tr>
				<td>
				</td>
				<td>
					<div class='block_title'>&nbsp;sport</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td style='background-color: #85c630;'>
					<div class='block_content_right'>
					<?php
					$url= 'http://news.google.fr/news?pz=1&cf=all&ned=fr&hl=fr&topic=s&output=rss';

					echo RSS_display($url, 3);		
					?>				
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
			<tr>
			<td>
			</td>
				<td>
					<div class='block_title'>&nbsp;écologie</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td style='background-color: #85c630;'>
					<div class='block_content_right'>	
					
					<?php
					$url= 'http://news.google.fr/news?hl=fr&gl=fr&q=%C3%A9cologie&um=1&ie=UTF-8&output=rss';

					echo RSS_display($url, 3);		
					?>					
					</div>
				</td>
			</tr>
</table>
</td>
</table>
</body>
</html>