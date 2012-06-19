<?php

	while($data = mysql_fetch_array($req))
	{
		$content = $data['content'];
		$id = $id_post = $data['id_post'];
		if(isset($id_user))
		{
				$requete="SELECT pseudo FROM users WHERE id_user= ".$id_user."";
				$sucess=mysql_query($requete) or die(mysql_error());
				while($resultats=mysql_fetch_assoc($sucess))
				{
					$data['pseudo'] = $resultats['pseudo'];
				}
		
		}
		//si le post est un flux RSS pulsé
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
					if(isset($_GET['pseudo'])) echo"<a style='color:red' href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;".$data['title'];
					else echo"<a style='color:red' href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;".$data['title'];
					echo"</div>";
				}
				else echo"&nbsp;".$data['title'];
			}
			
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
			echo "pulsé le : ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));	
			echo " par <a href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>!</div>";
			include('modeles/comment.php');
			
			echo"	</td>";
		

			echo"</tr>";
			echo"<tr>";
			
			echo"	<td>";
			if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$id."' /><input type='hidden' name='DEpulse' value='DEpulse' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
				echo"	<div class='propulse'>&nbsp;";
				echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$id."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			}
			
			echo"</td>";
			echo"</tr>";
			
			echo"</table>";
			
		}
		// si le post a été rédigé par un utilisateur
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
						echo"<a style='color:red' href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					}
					else 
					{
						echo"<a style='color:red' href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
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
				ob_start(); 
				imagejpeg($image, null, 80);
				$lol = ob_get_contents();
				ob_end_clean();
				echo '<br><img src="data:image/jpg;base64,' .  base64_encode($lol)  . '" /><br>';
			}
				
			$content = nl2br( $content , false );
			echo $content;
			echo"		</div>";
			echo"<span style='color:white;box-shadow: 5px 5px 3px #003e40;background-color: #85C630;border: 2px solid black;'>&nbsp;&nbsp;Ecrit le&nbsp;";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par <a href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>!</span>";
			
			echo"	</td>";			
			echo"	</td>";
			echo"</tr>";
			echo"<tr><td style='background-color: 85c630;'>";
			if(isset($_SESSION['pseudo'])) include('modeles/comment.php');
			echo"</tr></td>";
			echo"<tr>";
			echo"<td>";
			if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$id."' /><input type='hidden' name='DEpulse' value='DEpulse' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
				echo"	<div class='propulse'>&nbsp;";
				echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$id."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			}
			echo"</td>";
			echo"</tr>";
			echo"<tr style='height: 30px;'>";
			echo"</tr>";
			echo"</table>";
		}
			
			echo"<br><br><br>";
	}
?>