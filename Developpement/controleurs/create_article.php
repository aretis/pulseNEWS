<?php

include_once('modeles/call_db.php');
include_once('modeles/create_article.php');

$field_errors = 0;

if( isset($_POST['area']) || isset($_POST['cat']) )
{

	
	if( !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['area']) && !empty($_POST['cat']))
	{
		$article = array();

		$article['title'] = $_POST['title'];
		$article['description'] = $_POST['description'];
		$article['content'] = $_POST['content'];
		$article['area'] = $_POST['area'];
		$article['cat'] = $_POST['cat'];
		
		create_article($article);
		
		header('Location:index.php?page=profile');
	}
	else
	{
		$field_errors = 1;
	}
	
	
}



include('vues/header.php');
 

include('vues/create_article.php');
?>