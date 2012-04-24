<?php

/* Salman ALAMDAR 
	Page d'register 
	12/04/12 */
?>
	

	
<?php

include_once('modeles/call_db.php');

include('vues/header.php');

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['areaname']))
{
	include('modeles/check_register.php');
	check_register($_POST['pseudo'], $_POST['password'], $_POST['confirmpassword'], $_POST['firstname'], $_POST['surname'], $_POST['mail'], $_POST['areaname']);
}

if(!isset($_SESSION['js'])) $_SESSION['js'] = true;
	if(isset($_GET['js']))
	{
		if($_GET['js'] == "no" ) $_SESSION['js'] = false;
		else if($_GET['js'] == "yes") $_SESSION['js'] = true;
	}

	// Si javascript activé le <noscript> ne sera pas pris en compte
	
	if($_SESSION['js'])
	{
		// Dans le cas contraire on recharge la page avec le parametre js=no
		echo '<noscript>
		<meta http-equiv="Refresh" content="0; URL=register.php?js=no">
		</noscript>';
		include('modeles/show_form_errors.js');
	}
	
	// S'il est pas activé le <script> ne sera pas pris en compte
	
	else
	{
		// Dans le cas contraire on recharge la page avec le parametre js=yes
		if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['areaname']))
		{
			echo '<script language="JavaScript" type="text/javascript">
			document.location.href="register.php?js=yes";
			</script>';
			include('modeles/show_form_errors.php');
		}
	}
	
include('vues/register.php');
	
?>