<?php

/* Salman ALAMDAR 
	Page d'inscription 
	12/04/12 */
	
	session_start(); ?>
	
<html lang="fr">
<head>
	<title>pulseNEWS, sponsored by your mind!</title>
	<link rel="stylesheet" href="../CSS/inscription.css" />
</head>
<body>
<?php

	if(isset($_POST['pseudo']) && isset($_POST['password']))
	{
		include('check_connect.php');
		check_connect($_POST['pseudo'], $_POST['password']);
	}
	if(isset($_POST['pseudo']) && isset($_POST['password']))
		{
			if($_SESSION['js'])
			{
				// Dans le cas contraire on recharge la page avec le parametre js=no
				echo '<noscript>
				<meta http-equiv="Refresh" content="0; URL=connexion.php?js=no">
				</noscript>';     
				include('show_connexion_errors.js');
			}
			
			// S'il est pas activé le <script> ne sera pas pris en compte
			
			else
			{
				// Dans le cas contraire on recharge la page avec le parametre js=yes
				
					echo '<script language="JavaScript" type="text/javascript">
					document.location.href="connexion.php?js=yes";
					</script>';
					include('show_connexion_errors.php');
			}
		}
?>

<form id='start' name='formulaire' action='connexion.php' method='post' onSubmit='verif_formulaire()'>
<br>
<span id='title'>connexion</span></br>
<br><br>
<br>
<br>
<label for='name'>pseudo</label>
<input id='name' type='text' name='pseudo' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br>
<br>
<label for='password'>mot de passe</label>
<input id='password' type='password' name='password'/>

<input type="submit" value="Connexion"/>

</form>

</body>
</html>