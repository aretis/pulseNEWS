<?php

session_start();
 
 	if( isset($_GET['disconnect']))
	{
		unset($_SESSION['pseudo']);
		unset($_SESSION['id']);
		unset($_SESSION['id_user']);
	}
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

}
include('vues/footer.php');



 
 


?>