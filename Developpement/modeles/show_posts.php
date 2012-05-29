<?php

	while($data = mysql_fetch_array($req))
	{
		if( isset($pseudo))
			{
				$data['pseudo'] = $pseudo;
			}
		$content = $data['content'];
		$id = $id_post = $data['id_post'];
		
		if ($data['type'] == 1)
		{
			echo"		<table cellpadding='0' cellspacing='0' class='post_news' >";
			echo"		<tr style='height: 32px;'>";
			echo"		<td rowspan='1'>";
			echo"		<div class='title_post'>";
			
			if(isset($_SESSION['pseudo']))
			{
				if($data['pseudo'] == $_SESSION['pseudo'])
				{
					echo"<div class='delete_post'>";
					if(isset($_GET['pseudo'])) echo"<a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;".$data['title'];
					else echo"<a href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;".$data['title'];
					echo"</div>";
				}
			}
			else{
			echo"			&nbsp;".$data['title'];}
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
			echo "pulsé le :";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			
			echo $pseudo;
			echo "par ".$data['pseudo']." !</div>";
			include('modeles/comment.php');
			
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
		else if($data['type'] == 0)
		{
			echo"<table cellpadding='0' cellspacing='0' class='article'>";
			echo"<tr style='height: 10px;'>";
			echo"	<td rowspan='1'>";
			echo"	<div class='title_post'>";
			
			if(isset($_SESSION['pseudo']))
			{
				if($data['pseudo'] == $_SESSION['pseudo'])
				{
					echo"<div class='delete_post'>";
					if(isset($_GET['pseudo']))
					{
						echo"<a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					}
					else 
					{
						echo"<a href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					}
					echo"</div>";
				}
				else
				{
					echo"		&nbsp;".$data['title'];
				}
			}
			else{
			echo"		&nbsp;".$data['title'];
			}
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
			if($col === false )
			{
				echo "La requête est incorrect<br />".htmlentities($request).'<br />'.mysql_error();
				return;
			}
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
			echo"<span style='color:white;box-shadow: 5px 5px 3px #003e40;background-color: #85C630;border: 2px solid black;'>&nbsp;&nbsp;Ecrit le";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par ".$data['pseudo']."</span>";
			
			echo"	</td>";			
			echo"	</td>";
			echo"</tr>";
			echo"<tr><td>";
			include('modeles/comment.php');
			echo"</tr></td>";
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