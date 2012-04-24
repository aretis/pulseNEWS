<?php

/* Salman ALAMDAR 
	Page d'inscription 
	12/04/12 */?>
	
	<?php session_start(); ?>
	
<html lang="fr">
<head>
	<title>pulseNEWS, sponsored by your mind!</title>
	<link rel="stylesheet" href="../CSS/inscription.css" />
</head>
<body>
<?php

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['areaname']))
{
	include('check_register.php');
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
		<meta http-equiv="Refresh" content="0; URL=inscription.php?js=no">
		</noscript>';
		include('show_errors_of_form.js');
	}
	
	// S'il est pas activé le <script> ne sera pas pris en compte
	
	else
	{
		// Dans le cas contraire on recharge la page avec le parametre js=yes
		if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['areaname']))
		{
			echo '<script language="JavaScript" type="text/javascript">
			document.location.href="inscription.php?js=yes";
			</script>';
			include('show_errors_of_form.php');
		}
	}
?>

<form id='start' name='formulaire' action='inscription.php' method='post' onSubmit='verif_formulaire()'>
<br>
<span id='title'>inscription</span></br>
<br><br>
<br>
<br>
<label for='name'>pseudo</label>
<input id='name' type='text' name='pseudo' onblur='verifPseudo(this)' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br>
<?php $name = 'nom'; ?>
<label for='name'>nom</label>
<input id='name' type='text' name='surname' onblur='verifName(this)' VALUE ='<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>'>

<br>
<?php $name = 'prénom'; ?>
<label for='name'>prénom</label>
<input id='name' type='text' name='firstname' onblur='verifName(this)' VALUE ='<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>'>
<br>
<label for='name'>région</label>
<SELECT id='name' select='selected' name='areaname'>
<?php

$query = 'SELECT area_name FROM AREAS';
include_once('call_db.php');
$result = call_db($query);

	while($donnees = mysql_fetch_array($result))
	{
		echo'<option>'.$donnees['area_name'].'</option>';
	}
	
	mysql_free_result($result);
	mysql_close($link);?>
  </SELECT>
<br><br>
<label for='password'>mot de passe</label>
<input id='password' type='password' name='password'/>

<br>
<label for='password'>confirmation</label>
<input id='password' type='password' name='confirmpassword'/>

<br>
<label for='name'>adresse e-mail</label>
<input id='name' type='text' name='mail' onblur='verifMail(this)'size='30' VALUE ='<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>'/>
<br>
<input type="submit" value="s'inscrire"/>

</form>

</body>
</html>