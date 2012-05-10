<?php


	function view_article_user($id_user)
	{
		$article = array();
		
		$query = 'SELECT * FROM POSTS WHERE user = '.$id_user.' ORDER BY post_date DESC';
		
		$article = call_db($query);
		
		return $article;
	
	}
?>