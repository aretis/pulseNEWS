<?php
	/* Function whish show all the posts in the DB
		Salman ALAMDAR
		14/05/12 */

	function view_all_article($date, $rate, $type, $area, $cat)
	{
		$article = array();
		
		$query = 'SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user ORDER BY post_date DESC';
		
		$query = 'Select * from posts INNER JOIN users ON posts.id_user = users.id_user'
		
		
		if($type = 1) $query .= 'ORDER BY post_date DSC';
		else if ($type = 2) $query .= 'ORDER BY post_date ASC';
		
		if($date = 1) $query .= 'ORDER BY post_date DSC';
		else if ($date = 2) $query .= 'ORDER BY post_date ASC';
		
		if($rate = 1) $query .= 'ORDER BY rate DSC';
		else if ($rate = 2) $query .= 'ORDER BY rate ASC';
		
		
		
		$article = call_db($query);
		
		return $article;
	
	}
?>