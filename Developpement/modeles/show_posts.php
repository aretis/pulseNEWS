<?php

	while($data = mysql_fetch_array($req))
	{
		$content = $data['content'];
		$id = $id_post = $data['id_post'];
		
		if ($data['type'] == 1)
		{
		echo"		<table cellpadding='0' cellspacing='0' class='post_news' >";
		echo"		<tr style='height: 32px;'>";
		echo"		<td rowspan='1'>";
		echo"		<div class='title_post'>";
		echo"			&nbsp;".$data['title'];
		echo"		</div>";
		echo"		</td>";

		echo"		<td>";
		echo"			<div class='rate'>";
		if($data['rate'] > 0) echo" + ";
		echo $data['rate'];
		echo "</div>";
		echo"		</td>";
		echo"	</tr>";
		echo"	<tr style='background-color: #85c630;'>";
		echo"		<td>";
			echo"		<div class='description_news'>";
			echo"			<a class='news_link' href='".$data['description']."'>&nbsp;&nbsp;&nbsp;lire l'article&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;";
			echo "pulsé le : ".$data['post_date']." par 'SOLID !'</div>";
			echo"<form action='index.php?page=profile' method='post'/>";
			echo"<br>";
			echo"&nbsp;&nbsp;<input type='text' name='comment' placeholder='Commenter...' size='77%'>";
			echo"<input type='hidden' name='id_news' value='".$id."' />";
			echo"<input style='display:none' type='submit' />";
			echo'</form>';
			$query = "SELECT content, post_date, pseudo FROM comments NATURAL JOIN USERS WHERE id_post = ".$id;
			$result = call_db($query);
		
			while($data = mysql_fetch_array($result))
			{
				echo"<span style='font-size:22px; color:white; font-weight:bold;'>";
				echo "&nbsp;&nbsp;".$data['pseudo']; 
				echo": <br>";
				echo"</span>";
				
				echo"<span style='font-size:15px;'>";
				echo "&nbsp;&nbsp;".$data['content'];
				echo"</span>";
				
				echo"<span style='font-size:10px; color:white;'>";
				echo"<br>&nbsp;&nbsp;Ecrit le ";
				echo date("d/m/Y à H\hi", strtotime($data['post_date']));
				echo"<br><HR></span>";

			}
			echo"	</td>";



			echo"	<td style='background-color: white;'>";
			echo"		<div class='date_news'>";
				echo"	</div>";
					
				echo"</td>";

			echo"</tr>";
			echo"<tr>";
			
			echo"	<td>";
			echo"	<div class='debate'><form action='index.php?page=profile' method='POST'/><input type='submit' name='debattre' value='débattre' /></form></div>";
			echo"	<div class='depulse'>&nbsp;";
			echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$id."' /><input type='hidden' name='DEpulse' value='DEpulse' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
			echo"	<div class='propulse'>&nbsp;";
			echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$id."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			echo"</td>";
			echo"</tr>";
			
			echo"</table>";
			
		}
		else
		{
			echo"<table cellpadding='0' cellspacing='0' class='article'>";
			echo"<tr style='height: 10px;'>";
			echo"	<td rowspan='1'>";
			echo"	<div class='title_post'>";
			echo"		&nbsp;".$data['title'];
			echo"	</div>";
			echo"	</td>";
			echo"";
			echo"	<td>";
			echo"		<div class='rate'>";
			if($data['rate'] > 0) echo" + "; 
			echo $data['rate']."</div>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr style='background-color: #85c630;'>";
			echo"	<td>";
			echo"		<div class='article_content'>";
			echo"<p>";
			echo $data['description'];
			echo"</p>";
			
			$id = $data['id_post'];
			
			
			$request = "SELECT picture_id, picture_type, picture_blob FROM pictures WHERE post_id = $id";

			$sucess = mysql_query ($request) or die (mysql_error ());
			$col = mysql_fetch_assoc($sucess);
				if ( !$col['picture_id'])
				{
					echo "Id d'image inconnu";
				}
				else
				{
					$image = imagecreatefromstring($col['picture_blob']);
					ob_start(); //You could also just output the $image via header() and bypass this buffer capture.
					imagejpeg($image, null, 80);
					$data = ob_get_contents();
					ob_end_clean();
					echo '<br><img src="data:image/jpg;base64,' .  base64_encode($data)  . '" /><br>';
				}
				
			$content = nl2br( $content , false );
			echo $content;
			echo"		</div>";
			echo"<form action='index.php?page=profile' method='post'/>";
			echo"<br>";
			echo"&nbsp;&nbsp;<input type='text' name='comment' placeholder='Commenter...' size='77%'>";
			echo"<input type='hidden' name='id_news' value='".$id."' />";
			echo"<input style='display:none' type='submit' />";
			echo'</form>';
			$query = "SELECT content, post_date, pseudo FROM comments NATURAL JOIN USERS WHERE id_post = ".$id;
			$result = call_db($query);
		
			while($data = mysql_fetch_array($result))
			{
				echo"<span style='font-size:22px; color:white; font-weight:bold;'>";
				echo "&nbsp;&nbsp;".$data['pseudo']; 
				echo": <br>";
				echo"</span>";
				
				echo"<span style='font-size:15px;'>";
				echo "&nbsp;&nbsp;".$data['content'];
				echo"</span>";
				
				echo"<span style='font-size:10px; color:white;'>";
				echo"<br>&nbsp;&nbsp;Ecrit le ";
				echo date("d/m/Y à H\hi", strtotime($data['post_date']));
				echo"<br><HR></span>";

			}
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"<td>";
			echo"	<div class='debate'><form action='index.php?page=profile' method='POST'/><input type='submit' name='debattre' value='débattre' /></form></div>";
			echo"	<div class='depulse'>&nbsp;";
			echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$id."' /><input type='hidden' name='DEpulse' value='DEpulse' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
			echo"	<div class='propulse'>&nbsp;";
			echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$id."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			echo"</td>";
			echo"</tr>";
			echo"<tr style='height: 30px;'>";
			echo"</tr>";
			echo"</table>";
		}
			
			echo"<br><br><br>";
	}
?>