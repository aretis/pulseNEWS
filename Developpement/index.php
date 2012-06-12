<?php

session_start();
 $footer = 1;
 	if( isset($_GET['disconnect']))
	{
		unset($_SESSION['pseudo']);
		unset($_SESSION['id']);
		unset($_SESSION['id_user']);
	}
if (!isset($_GET['page']))
{
	include('controleurs/home.php');
	$footer = 0;
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
if($footer == 0)
{
	
}
else
{
	include('vues/footer.php');
}

 
 


?>