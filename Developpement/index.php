﻿<?php

session_start();
 
if( isset($_GET['page']) && $_GET['page'] == 'disconnect')
{
	unset($_SESSION['pseudo']);
}
 
 
if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
{
	
	include 'controleurs/'.$_GET['page'].'.php';
}
else
{
	include 'controleurs/news.php';
}
 

?>