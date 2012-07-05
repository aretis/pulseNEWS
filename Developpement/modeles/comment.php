﻿<?php

	/* Comments article
		14/05/2012
		Salman Alamdar
	*/


$query = "SELECT id_comment, content, post_date, pseudo FROM comments INNER JOIN users ON comments.id_user = users.id_user WHERE id_post = ".$id;

	$result = call_db($query);
		
		
		echo'<div id="wrapper">';
		if($_GET['page'] != "new_debate")
		{
			if(!isset($_POST['id_commentaire']) )
			{	
			
				echo'<div class="accordionButton" style="text-align:center;">afficher les commentaires...</div>';
				echo'<div class=accordionContent>';
			}
			else if(isset($_POST['id_commentaire']) && $_POST['id_commentaire'] != $id)
			{
				
				echo'<div class="accordionButton" style="text-align:center;">afficher les commentaires...</div>';
					echo'<div class=accordionContent>';
			}
			else if (isset($_POST['id_commentaire']) && $_POST['id_commentaire'] == $id)
			{
				echo'<div class="accordionButton" style="text-align:center;">afficher les commentaires...</div>';
				echo'<div class=accordionOuvert>';
			
			}
		}
		else{
			echo'<div class="accordionButtonDebate" style="text-align:center;">Le débat est en cours...</div>';
			echo'<div class=accordionOuvertDebate>';
		}
		
	while($data = mysql_fetch_array($result))
	{ 

		if (isset($_POST['id_commentaire']) && $_POST['id_commentaire'] == $id)
		{
		include('modeles/accordeon_ouvert.php');
		}
		else if(isset($_POST['id_commentaire']) && $_POST['id_commentaire'] != $id)
		{
		include('modeles/accordeon_fermer.php');
		}
		else{
		include('modeles/accordeon_fermer.php');
		}

	}
	echo"<form action='index.php?".$_SERVER['QUERY_STRING']."' method='post'/>";
	
	echo"<br>";
	echo"&nbsp;&nbsp;<input type='text' style='width: 100%' name='comment' placeholder='Nouveau commentaire...' size='87%'>";
	echo"<input type='hidden' name='id_news' value='".$id."' />";
	echo"<input type='hidden' name='id_commentaire' value='".$id."' />";

	echo"<input style='display:none' type='submit' />";
	echo'</form>';
	?>
	
	</div>
	</div>

	
	
	
	
	
	