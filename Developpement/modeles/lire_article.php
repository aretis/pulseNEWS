<?php
	include('modeles/connect_db.php');
	$id_article = $_GET['id'];
	$requete ="SELECT * FROM posts WHERE id=$id_article";
	$sucess = mysql_query ($requete) or die (mysql_error ());
	while ($resultats=mysql_fetch_assoc($sucess))
	{
		{ 
					echo 'tite: '.$resultats['title'].'   Date :'.$resultats['post_date'].'</br>
						'.$resultats['content'];
		}
	}

	$mode=$_GET['mode'];
	$recherche=$_GET['recherche'];

	echo 'retour à la liste de résultats: <a href="index.php?page=recherche&recherche='.$recherche.'&mode='.$mode.'&categorie='.$categorie.'" >retour à la liste de résultats</a>';
?> 
