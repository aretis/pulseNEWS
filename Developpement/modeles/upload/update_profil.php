<?php
$_SESSION['prenom']='christie';

	if ( isset($_POST['prenom']) )
	{
			include('connexion.php');
			$request = "UPDATE users SET pseudo = 'chepa' WHERE  id_user = '1'";
			$sucess = mysql_query ($request) or die (mysql_error ());
			echo 'ok!';
	}
			


?>