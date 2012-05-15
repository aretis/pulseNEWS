<?php
	/* Function whish show all the posts in the DB
		Salman ALAMDAR
		14/05/12 */

	function view_all_article()
	{
		$article = array();
		
		$query = 'SELECT * FROM posts ORDER BY post_date DESC';
		
		$article = call_db($query);
		
		return $article;
	
	}
?>