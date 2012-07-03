

	<?php
	
		
		echo"<div class='comment_post'>";
		

		
		echo"<span  font-weight:bold;'>";
			if(isset($_SESSION['pseudo']))
		{
			if($data['pseudo'] == $_SESSION['pseudo'])
			{
				if(isset($_GET['pseudo'])) echo"<div id='delete_com'><a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_comment=".$data['id_comment']."'>X</a></div>";
				else echo"<div id='delete_com'><a href='index.php?page=profile&delete_comment=".$data['id_comment']."'>X</a></div>";
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
		<div class='accordionButton2'>Répondre...</div>
		<div class='accordionContent2'>";
		
		
		
	
			echo"<form action='index.php?".$_SERVER['QUERY_STRING']."' method='post'/>";
			echo"<input type='hidden' name='id_parent' value='".$data['id_comment']."'/>
			<input type='hidden' name='id_news' value='".$id."' />
			<input type='hidden' name='id_commentaire' value='".$id."' />
			<input style='position:relative; left:10px;' id='input_comment' type='text' name='comment_a_comment' placeholder='Commenter...'/>
			
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
					if(isset($_GET['pseudo'])) echo"<div id='delete_com'><a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_comment_of_comment=".$data2['id_comment']."'>X</a></div>";
					else echo"<div id='delete_com'><a href='index.php?page=profile&delete_comment_of_comment=".$data2['id_comment']."'>X</a></div>";
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

	
	
	

	
	
	