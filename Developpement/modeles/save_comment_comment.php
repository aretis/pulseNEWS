<?php

	/* Function which save comment in the database
		Salman ALAMDAR
		13/05/2012
	*/
	
	function save_comment($id_post, $id_user, $id_parent, $content)
	{
<<<<<<< HEAD
		$type_notif= 2;
=======

<<<<<<< HEAD
		$type_notif='2';
=======
		

		$type_notif= 2;
>>>>>>> 88c6b8ccc17632932e3a657ac7aeab663aaa58da
>>>>>>> 164e0e896e836cd937bf2b3a9d24b470c4f5a464

		include('modeles/connect_db.php');
		
		mysql_query("SET NAMES 'utf8'");
		
		$query='INSERT INTO comment_a_comment VALUES ("", '.$id_user.', '.$id_post.', '.$id_parent.', "'.$content.'", NOW())';
		
		
		if(!mysql_query($query) )
		{
			echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
			return;
		}
		$dernier_id = mysql_insert_id();
		$requete2 = 'SELECT C.id_user FROM comments C 
		JOIN comment_a_comment CAC ON C.id_comment = CAC.id_parent';
		$sucess2 = mysql_query($requete2) or die(mysql_error());
		while ( $resultats2= mysql_fetch_assoc($sucess2))
		{
			
			$id_toto = $resultats2['id_user'];
		}
		
		$requete = 'SELECT id_user FROM comment_a_comment WHERE id_comment = '.$dernier_id.'';
		$sucess = mysql_query($requete) or die(mysql_error());
		while ( $resultats= mysql_fetch_assoc($sucess))
		{
			
			$id_pulseur = $resultats['id_user'];
		}
			$query='INSERT INTO notification VALUES ('.$dernier_id.','.$id_pulseur.','.$id_post.','.$id_toto.',"0",'.$type_notif.',NOW())';
			$sucess = mysql_query($query) or die(mysql_error());
	}
?>