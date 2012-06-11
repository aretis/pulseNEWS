<?php
	/* Function whish show all the posts in the DB
		Salman ALAMDAR
		14/05/12 */

	function view_all_article($date, $rate, $type, $area, $cat)
	{
		if($area != NULL)
		{
			$request = 'SELECT id_area FROM areas WHERE area_name ="'.$area.'"';
			$id = call_db($request);
			while($data = mysql_fetch_array($id))
			{
				$area = $data['id_area'];
			}
		}
		if($cat != NULL)
		{
			$request = 'SELECT id_cat FROM news_cat WHERE cat_name ="'.$cat.'"';
			$id = call_db($request);
			while($data = mysql_fetch_array($id))
			{
				$cat = $data['id_cat'];
			}
		}		
		
		$article = array();
		$query = 'SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user ';

		if($type != 0 || $area == 0 || $date == 0 || $rate == 0)
		{
			$query .= 'ORDER BY post_date DESC';
		}
		else
		{
			if($type == 1) $query .= 'WHERE type = 0 ';
			else if ($type == 2) $query .= 'WHERE type = 1 ';
			else if ($type == NULL) $query .= 'WHERE type IN(0,1) ';
			
			if($area != 0) $query .= 'AND area = '.$area;
			else if($cat != 0) $query .= 'AND cat = '.$cat;
			
			if($date == 1) $query .= ' ORDER BY post_date DESC';
			else if ($date == 2) $query .= ' ORDER BY post_date ASC';
			else if($rate == 1) $query .= ' ORDER BY rate DESC';
			else if ($rate == 2) $query .= ' ORDER BY rate ASC';
		}
		
		$article = call_db($query);
		return $article;
	
	}
?>