/* Function which display errors of the connexion form in JS
		Salman ALAMDAR
		19/04/12 
	*/
	
<script language="JavaScript" type="text/javascript"> 
	
		var field_empty =  '<?php echo $field_empty ; ?>' ; 
		var login_ok =  '<?php echo $login_ok ; ?>' ; 
		var pseudo_not_exists =  '<?php echo $pseudo_not_exists ; ?>' ; 
		
		if(field_empty == 1)
		{
			alert('Un ou plusieurs champ(s) sont vide(s)');
		}
		if(login_ok == 0)
		{
			alert('Le pseudo ou le mot de passe sont incorrects');
		}
		if(pseudo_not_exists == 1)
		{
			alert('Ce pseudo n\'existe pas, merci de créé un compte');
		}

</script>