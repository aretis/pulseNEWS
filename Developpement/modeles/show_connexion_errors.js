﻿<script language="JavaScript" type="text/javascript"> 
/* Function which display errors of the connexion form in JS
		Salman ALAMDAR
		19/04/12 
	*/	
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