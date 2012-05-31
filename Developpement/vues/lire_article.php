<?php
include("connexion.php");
$id_article = $_GET['id'];
$requete ="SELECT * FROM posts WHERE id_post=$id_article";
$sucess = mysql_query ($requete) or die (mysql_error ());
while ($resultats=mysql_fetch_assoc($sucess))
{
	{ 
				echo"  </td>
	<td>
	<table cellpadding='0' cellspacing='0' class='post_news' >
	<tr style='height: 32px;'>
		<td rowspan='1'>
		<div class='title_post'>
		&nbsp;Nom du journal: ".$resultats['title']."
		
		</div>
		</td>

		<td>
			<div class='rate'>+128</div>
		</td>
		</tr>
		<tr style='background-color: #85c630;'>
		<td>
		<div class='description'>
			".$resultats['content']."
		</div>
		</td>
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
		
	</td>
	</tr>
	</table>"; 



		
	}
}

$mode=$_GET['mode'];
$recherche=$_GET['recherche'];
$categorie=$_GET['categorie'];
echo 'retour à la liste de résultats: <a href="index.php?page=recherche&recherche='.$recherche.'&mode='.$mode.'&categorie='.$categorie.'" >retour</a>';


?> 
