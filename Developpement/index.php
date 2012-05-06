<?php

session_start();
 
if (!isset($_GET['page']))
{
	include('controleurs/home.php');
}
else
{
	if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
	{
		
		include 'controleurs/'.$_GET['page'].'.php';
	}
	else
	{
			include 'controleurs/news.php';
	}
	if($_GET['page'] == 'disconnect')
	{
		unset($_SESSION['pseudo']);
	}
}


 
 


?>