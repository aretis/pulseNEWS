<?php
	include('/../modeles/connect_db.php');
	mysql_query("SET NAMES 'utf8'");
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
			<div class='rate'>".$resultats['rate']."</div>
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
		 ".$resultats['post_date']."
		</div>
		
		</td>

	</tr>
	<tr>
	<td>
		
	</td>
	</tr>
	</table>"; 

	echo"	<td>
	<a href ='index.php?page=view_article&id_post=".$resultats['id_post']."' ><div class='comment_button'>voir l'article en entier!</div></a>";
			echo"</tr>";
			

		
	}
}

$mode=$_GET['mode'];
$recherche=$_GET['recherche'];
$categorie=$_GET['categorie'];
echo 'retour à la liste de résultats: <a href="index.php?page=recherche&recherche='.$recherche.'&mode='.$mode.'&categorie='.$categorie.'" >retour</a>';


?> 
