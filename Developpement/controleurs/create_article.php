<?php

include_once('modeles/call_db.php');
include_once('modeles/create_article.php');


if( !empty($_POST['title']) )
{
	$article = array();

	$article['title'] = $_POST['title'];
	$article['description'] = $_POST['description'];
	$article['content'] = $_POST['content'];
	$article['area'] = $_POST['area'];
	$article['cat'] = $_POST['cat'];
	
	create_article($article);
}



include(dirname(__FILE__).'/../vues/header.php');
 

include(dirname(__FILE__).'/../vues/create_article.php');
?>