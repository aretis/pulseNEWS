<?php
if ( isset($_GET['read_confirm']))
{
	include('modeles/connect_db.php');
	$requete="UPDATE notification SET read_confirm =1 WHERE id_comment=".$_GET['id_comment']."";
	$sucess=mysql_query($requete) or die(mysql_error());
}


	function view_article_user($id_user)
	{
		echo"". $id_user. "dans la fonction view_article";
		$article = array();
		
		$query = 'SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user WHERE posts.id_user = '.$id_user.' ORDER BY post_date DESC';
		
		$article = call_db($query);
		
		return $article;
	
	}
?>