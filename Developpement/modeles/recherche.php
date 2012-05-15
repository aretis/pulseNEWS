<?php
include("connexion.php");

if ((isset($_POST['recherche']) ||(isset($_GET['recherche']))))
{
	if( isset($_POST['recherche']))
	{
		$recherche=mysql_real_escape_string(htmlspecialchars($_POST['recherche']));
		$categorie=mysql_real_escape_string(htmlspecialchars($_POST['categorie']));
		$mode=mysql_real_escape_string(htmlspecialchars($_POST['mode']));
		
		
		
	}
	else 
	{
		$recherche=mysql_real_escape_string(htmlspecialchars($_GET['recherche']));
		$mode = mysql_real_escape_string(htmlspecialchars($_GET['mode']));
		$categorie= mysql_real_escape_string(htmlspecialchars($_GET['categorie']));
	}
	
	
	if (isset($mode) == "all_mots")
	{
			$mot_connexion = 'AND';
	}
	else 
	{
			$mot_connexion = 'OR';
	}
	
	
	
	if($mode == "exp_exacte") 
	{
	
		$requete = mysql_query("SELECT * FROM posts WHERE content LIKE '%$recherche%' AND cat_name='$categorie'");
		
		if($requete === false)
		{
			echo"la requete est incorrect <br> ".htmlentities($requete)."<br>".mysql_error();
			return;
		}
		$nb_resultat = 0;
		$nb_resultat = mysql_num_rows($requete);
		
		if($nb_resultat == 0)
		{
			echo ' Désolé, aucun élément ne correspond à votre recherche ou alors la recherche est mal effectuée.Voulez-vous recommencer?><a href=chercher.php</a>';
		}
		else 
		{
			echo ' ' .$nb_resultat .' résultats ont été trouvés pour votre recherche :</br>';
			While($resultats= mysql_fetch_array($requete))
			{ 
				echo 'titre: '.$resultats['title'].'   Date :'.$resultats['post_date'].'
				<a href = "index.php?page=voir_article&id='.$resultats['id'].'&recherche='.$recherche.'&mode='.$mode.'&categorie='.$categorie.'">lire l article!</a> </br>';
			}
		
		}
	}
	else 	
	{ 
		$mots = explode(" ", $recherche);
		$nombre_mots = count($mots);

		$part_requete = '';
	
		for($boucle=0; $boucle < $nombre_mots; $boucle++)
		{
			$part_requete .= "$mot_connexion content LIKE '%$mots[$boucle]%'";
			echo"<br/><br/>";
		}
	
		$part_requete = ltrim($part_requete,$mot_connexion);
	
		$requete = mysql_query("SELECT * FROM posts WHERE content LIKE '%$recherche%'AND cat_name='$categorie'");
	
		if($requete === false)
		{
			echo"la requete est incorrect <br> ".htmlentities($requete)."<br>".mysql_error();
			return;
		}
		$nb_resultat = 0;
		$nb_resultat = mysql_num_rows($requete);
		
		if($nb_resultat == 0)
		{
			echo ' Désolé, aucun élément ne correspond à votre recherche ou alors la recherche est mal effectuée.Voulez-vous recommencer?><a href=chercher.php</a>';
		}
		else 
		{
			echo ' ' .$nb_resultat .' résultat ont été trouvés pour votre recherche :</br>';
			While($resultats= mysql_fetch_array($requete))
			{ 
				echo 'titre: '.$resultats['title'].'   Date :'.$resultats['post_date'].'
				<a href ="index.php?page=lire_article&id='.$resultats['id'].'&recherche='.$recherche.'&mode='.$mode.'">lire l article!</a>';
			}
			
		}
	}	
}
else 
{
 
}	
?>