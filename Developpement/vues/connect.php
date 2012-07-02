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
<div class='block_title'>connexion</div><hr><br>
<label for='name'>&nbsp;&nbsp;pseudo</label>
<input id='name' type='text' name='pseudo' VALUE ='<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>'>
<br>
<br>
<label for='password'>&nbsp;&nbsp;mot de passe</label>
<input id='password' type='password' name='password'/><br><br>

<input type="submit" value=" se connecter ! " style="position:relative; top:0px; left:300px;"/>

</form>

