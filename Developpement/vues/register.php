
<link rel="stylesheet" href="design/register.css" />

<form id='start' name='formulaire' action='index.php?page=register' method='post' onSubmit='return verif_formulaire();'>

<div class='block_title'>inscription</div>
<hr>

<label for='name'>&nbsp;&nbsp;pseudo</label>
<input id='pseudo' type='text' name='pseudo' onblur='verifPseudo(this)' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br><br>
<?php $name = 'nom'; ?>
<label for='name'>&nbsp;&nbsp;nom</label>
<input id='surname' type='text' name='surname' onblur='verifName(this)' VALUE ='<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>'>

<br><br>
<?php $name = 'prénom'; ?>
<label for='name'>&nbsp;&nbsp;prénom</label>
<input id='firstname' type='text' name='firstname' onblur='verifName(this)' VALUE ='<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>'>
<br><br>
<label for='name'>&nbsp;&nbsp;région</label>
<SELECT id='areaname' select='selected' name='areaname'>
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
<br><br><br>
<label for='password'>&nbsp;&nbsp;mot de passe</label>
<input id='password' type='password' name='password'/>

<br><br>
<label for='password'>&nbsp;&nbsp;confirmation</label>
<input id='confirmpassword' type='password' name='confirmpassword'/>

<br><br>
<label for='name'>&nbsp;&nbsp;adresse e-mail</label>
<input id='mail' type='text' name='mail' onblur='verifMail(this)' size='30' VALUE ='<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>'/>
<br><br>
<input type="submit" value=" s'inscrire ! " style="position:relative; left:350px;"/>

</form>

</body>
</html>