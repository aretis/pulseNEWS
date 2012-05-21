<html>
<body>

<link rel="stylesheet" href="design/register.css" />

	<form action='index.php?page=modifier_compte' method='post' >
	 Nom<input type="text" name="nom"/><br/>
	 Prénom<input type="text" name="surnom"/><br/>
	 Mot de passe<input type="text" name="password"/><br/>
	 E-mail<input type="text" name="email"/><br/>
	 Ma région<input type="text" name="region"/><br/>
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
	<input type='submit'  value="envoyer"/>


</form>
</body>
</html>