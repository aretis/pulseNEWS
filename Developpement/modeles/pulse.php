<?php
/* Fonction qui s'occupe de g�rer le PROpulse et le DEpulse
	Note de l'article
	07/05/2012
	Salman ALAMDAR */

	function pulse($id_post, $id_user, $pulse, $type)
	{
		$link = mysql_connect("localhost","root","")
			or die("Connexion impossible : ".mysql_error());
		
		mysql_select_db("pulsenews")
			or die("Base de donn�es inaccessible.".mysql_error());
	
		$query='SELECT id_user, id_post FROM user_ratings WHERE id_user ='.(int)$id_user.' AND id_post ='.(int)$id_post;
		
		$result = mysql_query($query);
		
		if($result == false)
		{
			echo "La requ�te est incorrect<br />".htmlentities($query).'<br />'.mysql_error();
			return;
		}
		$row = mysql_fetch_array($result);
		
		if($row === false)
		{
			// Construction de la requ�te
			$query='SELECT rate FROM '.$type.' WHERE id_'.$type.' = '.(int)$id_post;
			
			$result = mysql_query($query);
			if($result === false )
			{
				echo "La requ�te est incorrect<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
			
			// R�cup�ration de l'enregistrement du r�sultat
			$row = mysql_fetch_assoc($result);
			
			if($row === false)
			{
				echo "Il n'existe pas de posts ".(int)$id_post;
				return;
			}
			
			
			if($pulse == 'PROpulse'){
			$row++;}
			else if($pulse == 'DEpulse'){
			$row--;}

			
			$query='UPDATE '.$type.' SET rate='.(int)$row.' WHERE id_'.$type.'='.(int)$id_post;
			
			if(!mysql_query($query) )
			{
				echo "La requ�te n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
				
			$query='INSERT INTO user_ratings VALUES('.$id_user.', '.$id_post.')';
			
			if(!mysql_query($query) )
			{
				echo "La requ�te n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
		}
		else 
		{
			echo"Vous avez d�ja not� cet article !";
		}
}