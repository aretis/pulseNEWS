<?php
/* Fonction qui s'occupe de g�rer le PROpulse et le DEpulse
	Note de l'article
	07/05/2012
	Salman ALAMDAR */

	function pulse($id_post, $pulse)
	{
		$link = mysql_connect("localhost","root","")
			or die("Connexion impossible : ".mysql_error());
		
		mysql_select_db("pulsenews")
			or die("Base de donn�es inaccessible.".mysql_error());
	
		// Construction de la requ�te
		$query='SELECT rate FROM posts WHERE id_post = '.(int)$id_post;
		
		// Ex�cuter la requ�te et r�cup�rer un objet r�sultat
		$result = mysql_query($query);
		if( $result === false )
		{
			// Erreur lors de la requ�te
			echo "OMGWTF LA REQUETE EST NAZE<br />".htmlentities($query).'<br />'.mysql_error();
			return
		}
		// R�cup�ration de l'enregistrement du r�sultat
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