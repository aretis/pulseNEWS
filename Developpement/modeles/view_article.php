<?php


	function view_article_user($id_user)
	{
		$article = array();
		
		$query = 'SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user WHERE posts.id_user = '.$id_user.' ORDER BY post_date DESC';
		
		$article = call_db($query);
		
		return $article;
	
	}
?>