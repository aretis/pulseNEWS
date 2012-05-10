<?php
/* Fonction qui s'occupe de gérer le PROpulse et le DEpulse
	Note de l'article
	07/05/2012
	Salman ALAMDAR */

	function pulse($id_post, $pulse)
	{
		$link = mysql_connect("localhost","root","")
			or die("Connexion impossible : ".mysql_error());
		
		mysql_select_db("pulsenews")
			or die("Base de données inaccessible.".mysql_error());
	
		// Construction de la requête
		$query='SELECT rate FROM posts WHERE id_post = '.(int)$id_post;
		
		// Exécuter la requête et récupérer un objet résultat
		$result = mysql_query($query);
		if( $result === false )
		{
			// Erreur lors de la requête
			echo "OMGWTF LA REQUETE EST NAZE<br />".htmlentities($query).'<br />'.mysql_error();
			return
		}
		// Récupération de l'enregistrement du résultat
		$row = mysql_fetch_assoc($result);
		
		if($row === false)
		{
			// SELECT ne retourne rien
			echo "queyrhjhqkbgvskuebrhk,nvbfvj";
			return
		}
		
		if($pulse == 'PROpulse'){
		$result++;}
		else if($pulse == 'DEpulse'){
		$result--;}

		$query='UPDATE post SET rate='.(int)$result.' WHERE id_post='.(int)$id_post;
		
		return result;
	}