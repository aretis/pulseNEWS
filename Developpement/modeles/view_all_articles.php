<?php
	/* Function whish show all the posts in the DB
		Salman ALAMDAR
		14/05/12 */

	function view_all_article($date, $rate, $type, $area, $cat)
	{
		if($area != 0)
		{
			$request = 'SELECT id_area FROM areas WHERE area_name ="'.$area.'"';
			$id = call_db($request);
			while($data = mysql_fetch_array($result))
			{
				$area = $data['id_area'];
			}
		}
		else if($cat != 0)
		{
			$request = 'SELECT id_cat FROM news_cat WHERE cat_name ="'.$cat.'"';
			$id = call_db($request);
			while($data = mysql_fetch_array($result))
			{
				$cat = $data['id_cat'];
			}
		}		
		
		$article = array();
		$query = 'Select * from posts INNER JOIN users ON posts.id_user = users.id_user';

		if($type == 1) $query .= 'WHERE type = 0 ';
		else if ($type == 2) $query .= 'WHERE type = 1';
		
		if($area != 0) $query .= 'AND area = '.$area;
		else if($cat != 0) $query .= 'AND cat ='.$cat;
		
		if($date == 1) $query .= 'ORDER BY post_date DESC';
		else if ($date == 2) $query .= 'ORDER BY post_date ASC';
		else if($rate == 1) $query .= 'rate DESC';
		else if ($rate == 2) $query .= 'ORDER BY rate ASC';
		
		$article = call_db($query);
		
		return $article;
	
	}
?>