<?php

/* Salman ALAMDAR 
	Page d'inscription 
	12/04/12 */
?>

<script type="text/javascript">
<!--

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function onlyLetters($element)
{
    $Syntaxe='/^[a-zA-Z]+$/';
    if(preg_match($Syntaxe,$element))
    {
      return true;
    }
    else
    {
      return false;
	  alert('Merci de vérifier votre nom et prénom.')
    }
}

function verifChamp(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
   }
   else
   {
      surligne(champ, false);
   }
   onlyLetters(champ);
}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      alert("Ce n'est pas une adresse électronique!");
   }
}

function verif_formulaire()
{
 if(document.formulaire.pseudo.value == "")  {
   alert("Veuillez entrer votre pseudo!");
   document.formulaire.pseudo.focus();
   return false;
  }
 if(document.formulaire.surname.value == "") {
   alert("Veuillez entrer votre nom!");
   document.formulaire.surname.focus();
   return false;
  }
  if(document.formulaire.firstname.value == "") {
   alert("Veuillez entrer votre prénom!");
   document.formulaire.firstname.focus();
   return false;
  }
  if(document.formulaire.password.value == "") {
   alert("Veuillez entrer votre mot de passe!");
   document.formulaire.password.focus();
   return false;
  }
  if(document.formulaire.confirmpassword.value == "") {
   alert("Veuillez confirmer votre mot de passe!");
   document.formulaire.confirmpassword.focus();
   return false;
  }
 if(document.formulaire.mail.value == "") {
   alert("Veuillez entrer votre adresse électronique!");
   document.formulaire.mail.focus();
   return false;
  }
 if(document.formulaire.mail.value.indexOf('@') == -1) {
   alert("Ce n'est pas une adresse électronique!");
   document.formulaire.mail.focus();
   return false;
  }
}
//-->
</script>

<DOCTYPE html>
<html lang="fr">

<html>

<head>
	<title>pulseNEWS, sponsored by your mind!</title>
	<link rel="stylesheet" href="../CSS/style.css" />
	<link rel="stylesheet" href="../CSS/inscription.css" />
	<link rel="icon" type="image/gif" href="favicon.gif" />
</head>
<body>
<div class='header'>
	<table cellspacing="0">
		<td>
				<img style='width: 451px;' src='img/logo_header.png'/>
				
		</td>
		<td style='width: 100%;'>
		</td>
		<td>
				<div class='header_info'>
					Recherche:
					<input name="search" value='Votre recherche'/>
					Bonjour, Salman!<br>
					<a href='' style='color: white;'>(se déconnecter)</a><br><br>
					<div class='header_menu'>
						<a href='' style='color: white;'>fil d'actualités</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>débat du jour</a>&nbsp;&nbsp;
						<a href='' style='color: white;'>mon profil</a>&nbsp;&nbsp;
					</div>
				</div>
		</td>
	</table>
</div>
<?php

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['areaname']))
{
	include('check_register.php');
	check_register($_POST['pseudo'], $_POST['password'], $_POST['confirmpassword'], $_POST['firstname'], $_POST['surname'], $_POST['mail'], $_POST['areaname']);
}

?>

<form id='start' action='inscription.php' method='post' onSubmit='return verif_formulaire()'>
<br>
<span id='title'>inscription</span></br>
<br><br>
<br>
<br>
<label for='name'>pseudo</label>
<input id='name' type='text' name='pseudo' onblur='verifChamp(this)' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br>
<label for='name'>nom</label>
<input id='name' type='text' name='surname' onblur='verifChamp(this)' VALUE ='<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>'>

<br>
<label for='name'>prénom</label>
<input id='name' type='text' name='firstname' onblur='verifChamp(this)' VALUE ='<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>'>
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
<input id='name' type='text' name='mail' size='30' onblur='verifMail(this)' VALUE ='<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>'/>
<br>
<input type="submit" value="s'inscrire"/>

</form>

</body>
</html>