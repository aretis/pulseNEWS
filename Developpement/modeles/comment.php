﻿<?php

	/* Comments article
		14/05/2012
		Salman Alamdar
	*/


$query = "SELECT id_comment, content, post_date, pseudo FROM comments INNER JOIN USERS ON comments.id_user = users.id_user WHERE id_post = ".$id;
	$result = call_db($query);
	?>
	
		<div id="wrapper">
		<div class="accordionButton" style='text-align:center;'>afficher les commentaires...</div>
		
		
	<?php
	while($data = mysql_fetch_array($result))
	{
		if (isset($_POST['id_commentaire']) && $_POST['id_commentaire'] == $id)
		{
		echo'<div class="accordionOuvert">';
		include('/../modeles/accordeon_ouvert.php');
		}

		else if(isset($_POST['id_commentaire']) && $_POST['id_commentaire'] != $id)

		$request = "SELECT profile_picture FROM users WHERE pseudo = '".$data['pseudo']."'";

			$sucess = mysql_query ($request) or die (mysql_error());
			$col = mysql_fetch_assoc($sucess);
			if (empty($col['profile_picture']))
			{
				echo"<img src='design/img/exemple_profile.jpg'/>";
			}
			else
			{
				$image = imagecreatefromstring($col['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
			}
		echo "&nbsp;&nbsp;<a href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>"; 
		echo": &nbsp;&nbsp;";
		echo"</span>";
		
		echo"<span>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;".$data['content'];
		echo"</span>";
		
		echo"<span style='font-size:10px;'>";
		echo"<br>Le ";
		echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			
		
		echo"</div>";

		
		echo"<div id='wrapper'>
		<div class='accordionButton2'>Répondre...</div>
		<div class='accordionContent2'>";
		
		
		
	
			echo"<form action='index.php?".$_SERVER['QUERY_STRING']."' method='post'/>";
			echo"<input type='hidden' name='id_parent' value='".$data['id_comment']."'/>
			<input type='hidden' name='id_news' value='".$id."' />
			<input id='input_comment' type='text' name='comment_a_comment' placeholder='Commenter...'/>
			
			<input style='display:none' type='submit'/>
			</form><br>";
		
  echo"</div></div>";
  

		
		$request = "SELECT id_comment, content, post_date, pseudo FROM comment_a_comment INNER JOIN USERS ON comment_a_comment.id_user = users.id_user WHERE id_post = ".$id." AND id_parent=".$data['id_comment'];
		$resultat = call_db($request);
		
		while($data2 = mysql_fetch_array($resultat))
		{
			echo'<div class=accordionContent>';
			include('/../modeles/accordeon_fermer.php');
		}
		
		else
		{
			echo'<div class=accordionContent>';
			include('/../modeles/accordeon_fermer.php');
		}

	}	

	echo"<form action='index.php?".$_SERVER['QUERY_STRING']."' method='post'/>";
	
	echo"<br>";
	echo"&nbsp;&nbsp;<input type='text' name='comment' placeholder='Nouveau commentaire...' size='87%'>";
	echo"<input type='hidden' name='id_news' value='".$id."' />";
	echo"<input style='display:none' type='submit' />";
	echo'</form>';


	?>
	
	
	
		</div>

	</div>
	
	
	
	