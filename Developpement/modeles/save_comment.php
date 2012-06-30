<?php

	/* Function which save comment in the database
		Salman ALAMDAR
		13/05/2012
	*/
	
	function save_comment($id_post, $id_user, $content)
	{
		$type_de_notif= 1;
		include('modeles/connect_db.php');
		
		mysql_query("SET NAMES 'utf8'");
		
		$query='INSERT INTO comments VALUES ("", '.$id_user.', '.$id_post.', "'.$content.'", NOW())';
		
		
		if(!mysql_query($query) )
		{
			echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
			return;
		}
		$dernier_id =  mysql_insert_id();
	
		$requete = 'SELECT id_user FROM posts WHERE id_post = '.$id_post.'';
		$sucess = mysql_query($requete) or die(mysql_error());
		while ( $resultats= mysql_fetch_assoc($sucess))
		{
			
			$id_pulseur = $resultats['id_user'];
		}
			$query='INSERT INTO notification VALUES ('.$dernier_id.','.$id_user.','.$id_post.','.$id_pulseur.',"0",'.$type_de_notif.')';
			$sucess = mysql_query($query) or die(mysql_error());
	}
?>