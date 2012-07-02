<?php

	while($data = mysql_fetch_array($req))
	{
		$content = $data['content'];
		$id = $id_post = $data['id_post'];
		if(isset($id_user))
		{
				$requete="SELECT pseudo FROM users WHERE id_user= ".$id_user;
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
					if(isset($_GET['pseudo'])) echo"<a style='color:red' href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."'>".$data['title']."</a>";
					else echo"<a style='color:red' href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."'>".$data['title']."</a>";
					echo"</div>";
				}
				else echo"<a href='index.php?page=view_article&id_post=".$data['id_post']."'>".$data['title']."</a>";
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
			echo"	<tr>";
			echo"		<td>";
			echo"		<div class='description_news'>";
			echo"<a href=\"".$data['description']."\" >
				<img id=\"myDiv\" src='design/img/news_1.png' 
				onmouseover=\"this.src='design/img/news_2.png';\" 
				onmouseout=\"this.src='design/img/news_1.png';\"/>
			</a>";
			echo "pulsé le : ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));	
			echo " par <a style='color: black;' href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>!</div>";
			include('modeles/comment.php');
			
			echo"	</td>";
		

			echo"</tr>";
			echo"<tr>";
			
			echo"	<td>";
			if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=".$_GET['page'];
				if( isset($_GET['pseudo']))
				{
				
					echo"&pseudo=".$_GET['pseudo'];
				}
				if( isset($_GET['id_post']))
				{
				
					echo"&id_post=".$_GET['id_post'];
				}
				
				echo"&id_news=".$id."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=".$_GET['page'];
				if( isset($_GET['pseudo']))
				{
				
					echo"&pseudo=".$_GET['pseudo'];
				}
				if( isset($_GET['id_post']))
				{
				
					echo"&id_post=".$_GET['id_post'];
				}
				
				echo"&id_news=".$id."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
			}
			else if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile&id_news=".$id."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile&id_news=".$id."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
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
						echo"<a style='color:red' href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."'>".$data['title']."</a>";
					}
					else 
					{
						echo"<a style='color:red' href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."'>".$data['title']."</a>";
					}
					echo"</div>";
				}
				else
				{
					echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."'>".$data['title']."</a>";
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
			echo"<tr>";
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
			echo"<span class='info_post'>&nbsp;&nbsp;Ecrit le&nbsp;";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par <a style='color: black;' href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>!</span>";
			
			echo"	</td>";			
			echo"	</td>";
			echo"</tr>";
			echo"<tr><td>";
			if(isset($_SESSION['pseudo'])) include('modeles/comment.php');
			echo"</tr></td>";
			echo"<tr>";
			echo"<td>";
			
			if(isset($_SESSION['pseudo']) && isset($_GET['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile?pseudo=".$_GET['pseudo']."&id_news=".$id."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile&pseudo=".$_GET['pseudo']."&id_news=".$id."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
			}
			else if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile&id_news=".$id."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile&id_news=".$id."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
			}
			

			echo"</td>";
			echo"</tr>";
			echo"<tr style='height: 30px;'>";
			echo"</tr>";
			echo"</table>";
		}
			
			echo"<br><br><br><br>";
	}
?>