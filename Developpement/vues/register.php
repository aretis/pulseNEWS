
<link rel="stylesheet" href="design/register.css" />

<form id='start' name='formulaire' action='index.php?page=register' method='post' onSubmit='verif_formulaire()'>
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
<input type="submit" value=" s'inscrire ! "/>

</form>

</body>
</html>