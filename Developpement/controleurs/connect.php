<?php

/* Salman ALAMDAR 
	connexion page
	12/04/12*/
	include(dirname(__FILE__).'/../vues/header.php');

	if(isset($_POST['pseudo']) && isset($_POST['password']))
	{
		include('modeles/check_connect.php');
		check_connect($_POST['pseudo'], $_POST['password']);
	}
	
	if(!isset($_SESSION['js'])) $_SESSION['js'] = true;
	if(isset($_GET['js']))
	{
		if($_GET['js'] == "no" ) $_SESSION['js'] = false;
		else if($_GET['js'] == "yes") $_SESSION['js'] = true;
	}
	
	if(isset($_POST['pseudo']) && isset($_POST['password']))
		{
			if($_SESSION['js'])
			{
				// Dans le cas contraire on recharge la page avec le parametre js=no
				echo '<noscript>
				<meta http-equiv="Refresh" content="0; URL=index.php?page=connect&js=no">
				</noscript>';
				
				echo('<script type="text/javascript">');
					echo('var field_empty = "'.$field_empty.'";');
					echo('var login_ok = "'.$login_ok.'";');
					echo('var pseudo_not_exists  = "'.$pseudo_not_exists .'";');
				echo('</script>');
				
				include('modeles/show_connexion_errors.js');
			}
			
			// S'il est pas activé <script> ne sera pas pris en compte
			
			else
			{
				// Dans le cas contraire on recharge la page avec le parametre js=yes
				
					echo '<script language="JavaScript" type="text/javascript">
					document.location.href="index.php?page=connect&js=yes";
					</script>';
					include('modeles/show_connexion_errors.php');
			}
		}
		
		include('vues/connect.php');
?>