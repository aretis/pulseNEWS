<?php
/* Fonction qui s'occupe de gérer le PROpulse et le DEpulse
	Note de l'article
	07/05/2012
	Salman ALAMDAR */

	function pulse($id_post, $id_user, $pulse, $type)
	{
	
		$pulse1 = $pulse;
		$link = mysql_connect("localhost","root","")
			or die("Connexion impossible : ".mysql_error());
		
		mysql_select_db("pulsenews")
			or die("Base de données inaccessible.".mysql_error());
		mysql_query("SET NAMES 'utf8'");
		$query='SELECT id_user, id_post FROM user_ratings WHERE id_user ='.(int)$id_user.' AND id_post ='.(int)$id_post;
		
		$result = mysql_query($query);
		
		if($result == false)
		{
			echo "La requête est incorrect<br />".htmlentities($query).'<br />'.mysql_error();
			return;
		}
		$row = mysql_fetch_assoc($result);
		if($row === false)
		{
			
			
			// Construction de la requête
			$query='SELECT rate FROM '.$type.' WHERE id_post = '.(int)$id_post;
			
			$result = mysql_query($query);
			if($result === false )
			{
				echo "La requête est incorrect<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
			
			
			// Récupération de l'enregistrement du résultat
			$row = mysql_fetch_assoc($result);
			
			if($row === false)
			{
				echo "Il n'existe pas de posts ".(int)$id_post;
				return;
			}
			
			
			if($pulse1 == 'PROpulse')
			{
				$row['rate'] ++;
			}
			else if($pulse1 == 'DEpulse')
			{
				$row['rate'] --;
			}

			
			$query='UPDATE '.$type.' SET rate='.(int)$row['rate'].' WHERE id_post ='.(int)$id_post;
			
			if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
				
			$query='INSERT INTO user_ratings VALUES('.$id_user.', '.$id_post.')';
			
			if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
		}
		else 
		{
			echo"Vous avez déja noté cet article !";
		}
}