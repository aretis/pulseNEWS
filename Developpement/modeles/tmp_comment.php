<?php

	include('save_comment.php');
	save_comment($id_post, $id_user, $content);
	$id_post=2;
	$id_user=2;
	$content ="OUAIIIII TROP LOL QUOI";

	
	ec
	$query = "SELECT content, post_date, pseudo  FROM comments NATURAL JOIN USERS";
	include('call_db.php');
	$result = call_db($query);

	while($data = mysql_fetch_array($result))
	{
		echo $data['content'];
		echo $data['post_date'];
		echo $data['pseudo'];
	}

?>		

	


