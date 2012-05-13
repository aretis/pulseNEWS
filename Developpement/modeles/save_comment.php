<?php

	/* Function whish save comment in the database
		Salman ALAMDAR
		13/05/2012
	*/
	
	function save_comment($id_post, $id_user, $content)
	{
		$link = mysql_connect("localhost","root","")
		or die("Connexion impossible : ".mysql_error());
		
		mysql_select_db("pulsenews")
			or die("Base de données inaccessible.".mysql_error());
		
		mysql_query("SET NAMES 'utf8'");
		
		$query='INSERT INTO comments VALUES ("", '.$id_user.', '.$id_post.', "", "'.$content.'", NOW())';
		
		if(!mysql_query($query) )
		{
			echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
			return;
		}
	}
?>