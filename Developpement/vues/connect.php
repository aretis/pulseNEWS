<?php

/* Salman ALAMDAR 
	Page de connexion
	12/04/12 */
	
 ?>
	

	<link rel="stylesheet" href="design/register.css" />

<script language="JavaScript" type="text/javascript"> 
	
function verif_formulaire()
{
	if(field_empty == 1)
	{
		alert('Un ou plusieurs champ(s) sont vide(s)');
	}
	else
	{
		if(pseudo_not_exists == 0)
		{
			alert('Ce pseudo n\'existe pas, merci de créer un compte');
		}
		else if(login_ok == 0)
		{
			alert('Le pseudo ou le mot de passe sont incorrects');
		}
	}
}
</script>
<br>
<br>
<form id='start' name='formulaire' action='index.php?page=connect' method='post' onSubmit='verif_formulaire()'>
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

<input type="submit" value=" se connecter ! "/>

</form>

</body>
</html>