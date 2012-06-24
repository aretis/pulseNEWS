<?php

/* Salman ALAMDAR 
	connexion page
	12/04/12*/
	
	if(isset($_POST['pseudo']) && isset($_POST['password']))
	{
		include('modeles/check_connect.php');
		check_connect($_POST['pseudo'], $_POST['password']);
		include('modeles/show_connexion_errors.php');
	}
	
	if(!isset($_SESSION['js'])) $_SESSION['js'] = true;
	if(isset($_GET['js']))
	{
		if($_GET['js'] == "no" ) $_SESSION['js'] = false;
		else if($_GET['js'] == "yes") $_SESSION['js'] = true;
	}

	if($_SESSION['js'])
	{
		// Dans le cas contraire on recharge la page avec le parametre js=no
		echo '<noscript>
		<meta http-equiv="Refresh" content="0; URL=index.php?page=home&js=no">
		</noscript>';
		
		echo'<link rel="stylesheet" href="design/withJS.css" />';
	}
	
	// S'il est pas activé <script> ne sera pas pris en compte
	
	else
	{
		// Dans le cas contraire on recharge la page avec le parametre js=yes
		
		echo '<script language="JavaScript" type="text/javascript">
		document.location.href="index.php?page=home&js=yes";
		</script>';
		echo'<link rel="stylesheet" href="design/withoutJS.css" />';
	}
?>