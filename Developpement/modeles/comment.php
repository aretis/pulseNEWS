<?php
	
	/* Comments article
		14/05/2012
		Salman Alamdar
	*/


$query = "SELECT id_comment, content, post_date, pseudo FROM comments INNER JOIN USERS ON comments.id_user = users.id_user WHERE id_post = ".$id;
	$result = call_db($query);
	?>
	
		<div id="wrapper">
		<div class="accordionButton" style='text-align:center;'>afficher les commentaires...</div>
		<div class="accordionContent">
		
	<?php
	while($data = mysql_fetch_array($result))
	{
		
		echo"<div class='comment_post'>";
		

		
		echo"<span  font-weight:bold;'>";
			if(isset($_SESSION['pseudo']))
		{
			if($data['pseudo'] == $_SESSION['pseudo'])
			{
				if(isset($_GET['pseudo'])) echo"<a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_comment=".$data['id_comment']."'>X</a>";
				else echo"<a href='index.php?page=profile&delete_comment=".$data['id_comment']."'>X</a>";
			}
		}
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
		<div class='accordionButton2' style='text-align:center;'>Répondre...</div>
		<div class='accordionContent2'>";
		
		
		
	
			echo"<br><form action'index.php?page=";
			if($_GET['page'] == "profile") echo "profile";
			else if($_GET['page'] == "news") echo "news";
			echo "' method='POST'>
			<input type='hidden' name='id_parent' value='".$data['id_comment']."'/>
			<input type='hidden' name='id_news' value='".$id."' />
			<input id='input_comment' type='text' name='comment_a_comment' placeholder='Commenter...'/>
			
			<input style='display:none' type='submit'/>
			</form><br>";
		
  echo"</div></div>";
  

		
		$request = "SELECT id_comment, content, post_date, pseudo FROM comment_a_comment INNER JOIN USERS ON comment_a_comment.id_user = users.id_user WHERE id_post = ".$id." AND id_parent=".$data['id_comment'];
		$resultat = call_db($request);
		
		while($data2 = mysql_fetch_array($resultat))
		{
			echo"<div id='all_comment_comment'>";
			echo"<div class='comment_post'>";
			echo"<span  font-weight:bold;'>";
			if(isset($_SESSION['pseudo']))
			{
				if($data2['pseudo'] == $_SESSION['pseudo'])
				{
					if(isset($_GET['pseudo'])) echo"<a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_comment_of_comment=".$data2['id_comment']."'>X</a>";
					else echo"<a href='index.php?page=profile&delete_comment_of_comment=".$data2['id_comment']."'>X</a>";
				}
			}
			$request = "SELECT profile_picture FROM users WHERE pseudo = '".$data2['pseudo']."'";
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
			echo "&nbsp;&nbsp;<a href='index.php?page=profile&pseudo=".$data2['pseudo']."'>".$data2['pseudo']." </a>"; 
			echo": &nbsp;&nbsp;";
			echo"</span>";
			
			echo"<span>";
			echo "&nbsp;&nbsp;".$data2['content'];
			echo"</span>";
			
			echo"<span style='font-size:10px;'>";
			echo"<br>&nbsp;&nbsp;Ecrit le ";
			echo date("d/m/Y à H\hi", strtotime($data2['post_date']));
			echo"</div>";
			echo"</span>";
			echo"</div>";
		}
		
		echo"</span>";
		
		echo"</span><hr>";

	}
	
	
	if(isset($_GET['pseudo'])) echo"<form action='index.php?page=profile&pseudo=".$_GET['pseudo']."' method='post'/>";
	else echo"<form action='index.php?page=profile' method='post'/>";
	echo"<br>";
	echo"&nbsp;&nbsp;<span style='font-size: 12px; font-weight: bold;' >Nouveau commentaire : </span><input type='text' name='comment' placeholder='Commenter...' size='87%'>";
	echo"<input type='hidden' name='id_news' value='".$id."' />";
	echo"<input style='display:none' type='submit' />";
	echo'</form>';

	?>
	
	
	
		</div>

	</div>
	