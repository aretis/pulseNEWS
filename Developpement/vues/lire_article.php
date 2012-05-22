<?php
include("connexion.php");
$id_article = $_GET['id'];
$requete ="SELECT * FROM posts WHERE id=$id_article";
$sucess = mysql_query ($requete) or die (mysql_error ());
while ($resultats=mysql_fetch_assoc($sucess))
{
	{ 
				echo 'titre: '.$resultats['title'].'   Date :'.$resultats['post_date'].'</br>
					'.$resultats['content'];
	}
}

$mode=$_GET['mode'];
$recherche=$_GET['recherche'];
$categorie=$_GET['categorie'];
echo 'retour à la liste de résultats: <a href="index.php?page=recherche&recherche='.$recherche.'&mode='.$mode.'&categorie='.$categorie.'" >retour</a>';


?> 
