<?php

/* Salman ALAMDAR 
	Page de connexion
	12/04/12 */
	
 ?>
	

	<link rel="stylesheet" href="design/register.css" />
<br>
<br>
<form id='start' name='formulaire' action='index.php?page=connect' method='post'>
<br>
<div class='block_title'>connexion</div><hr>
<label for='name'>pseudo</label>
<input id='name' type='text' name='pseudo' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br>
<br>
<label for='password'>mot de passe</label>
<input id='password' type='password' name='password'/>

<input type="submit" value=" se connecter ! "/>

</form>

