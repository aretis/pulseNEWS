﻿﻿<?php

	/* Comments article
		14/05/2012
		Salman Alamdar
	*/


$query = "SELECT id_comment, content, post_date, pseudo FROM comments INNER JOIN USERS ON comments.id_user = users.id_user WHERE id_post = ".$id;
	$result = call_db($query);
		
		
		echo'<div id="wrapper">';
		if(isset($_POST['id_commentaire']) && $_POST['id_commentaire'] != $id)
		{
			
			echo'<div class="accordionButton" style="text-align:center;">afficher les commentaires...</div>';
		}
		if(!isset($_POST['id_commentaire']) )
		{	
		
			echo'<div class="accordionButton" style="text-align:center;">afficher les commentaires...</div>';
		}
	
	while($data = mysql_fetch_array($result))
	{ 
		
		if (isset($_POST['id_commentaire']) && $_POST['id_commentaire'] == $id)
		{
		echo'1';
		echo'<div class="accordionOuvert">';
		
		include('/../modeles/accordeon_ouvert.php');
		}
		else if(isset($_POST['id_commentaire']) && $_POST['id_commentaire'] != $id)
		{
		echo'2';
		echo'<div class=accordionContent>';
		include('/../modeles/accordeon_fermer.php');
		}
		else{
		echo'3';
		echo'<div class=accordionContent>';
		include('/../modeles/accordeon_fermer.php');
		}

	}	


	?>
	<div/>
	<div/>

	
	
	
	
	
	