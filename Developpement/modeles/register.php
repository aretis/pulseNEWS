/* Salman ALAMDAR 
	Page d'inscription 
	12/04/12*/

<?php

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['areaname']))
{
	include('check_register.php');
	check_register($_POST['pseudo'], $_POST['password'], $_POST['confirmpassword'], $_POST['firstname'], $_POST['surname'], $_POST['mail'], $_POST['areaname']);
}
?>
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


<form id='start' action='inscription.php' method='post'>
<br>
<span id='title'>inscription</span></br>
<br><br>
<br>
<br>
<label for='name'>pseudo</label>
<input id='name' type='text' name='pseudo' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br>
<label for='name'>nom</label>
<input id='name' type='text' name='surname' VALUE ='<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>'>

<br>
<label for='name'>prénom</label>
<input id='name' type='text' name='firstname' VALUE ='<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>'>
<br>
<label for='name'>région</label>
<SELECT id='name' select='selected' name='areaname'>
<?php

$query = 'SELECT area_name FROM AREAS';
include('call_db.php');
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
<input id='name' type='text' name='mail' VALUE ='<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>'/>
<br>
<input type="submit" value="s'inscrire"/>

</form>



<pre id='block'>
<br>
<span id='title'>pulseNEWS c'est :</span>
<br><br>
<span id='texte'>
de l'information participative<br>
une liberté d'expression<br>
des débats quotidiens<br>
des thèmes variés<br>
votre blog<br>
VOUS !<br>
</span>

</body>
</html>