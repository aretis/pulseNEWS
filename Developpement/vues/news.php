
<SCRIPT text='JAVASCRIPT'>

function change(num) 
{
	if(num == 1)
	{
		
		document.getElementById("area").style.display = "inline";
	}
	else if(num == 2)
	{
		document.getElementById("cat").style.display = "inline";
	}
}

</Script>
<?php


	if(isset($_GET['disconnect'])) unset($_SESSION['pseudo']);
	if(isset($_GET['delete_post'])) include('modeles/delete_post.php');
	
	if(isset($_POST['pulse']))
	{
		// Checking if entry is not a duplicate
		
		mysql_query("SET NAMES 'utf8'");
		
		$query = 'SELECT title FROM posts WHERE id_user='.$_SESSION['id_user'];
		$result = call_db($query);
			
		$news_exists = 0;
		
		while($data = mysql_fetch_array($result))
		{
			if	(($data['title']) == ($_POST['title']))
			{	
				$news_exists = 1;	
			}

		}
		
		if($news_exists == 0)
		{
			$query='INSERT INTO posts VALUES ("", "'.$_SESSION['id_user'].'", "1", "'.$_POST['title'].'", "'.$_POST['link'].'", "", "'.$_POST['cat'].'", "0", NOW(), "0")';
			
			if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
		}
	}
?>
<div class='tri'>
	<div class='shorti'>Trier par : </div>
	<br>
	
	<SELECT name='type' select='selected'>
		<option value='0'>Date</option>
		<option value='1'>Les plus récentes</option>
		<option value='2'>Les moins récentes</option>
	</SELECT>

	<SELECT onchange='change(this.selectedIndex)'>
		<option>Type de News</option>
		<option>News rédigé</option>
		<option>News pulsé</option>
	</SELECT>

	<SELECT id='area' name='area' select='selected'>
	<option>Région</option>
		<?php

			$query = 'SELECT area_name FROM AREAS';
			$result = call_db($query);

			while($donnees = mysql_fetch_array($result))
			{
				echo'<option>'.$donnees['area_name'].'</option>';
			}

			mysql_free_result($result);
			mysql_close($link);
		?>
	</SELECT>


	<SELECT id='cat' name='cat' select='selected'>
	<option>Catégorie</option>
		<?php

			$query = 'SELECT cat_name FROM news_cat';
			$result = call_db($query);

			while($donnees = mysql_fetch_array($result))
			{
				echo'<option>'.$donnees['cat_name'].'</option>';
			}

			mysql_free_result($result);
			mysql_close($link);
		?>
	</SELECT>

	<input type='submit' value='trier' />
	<br><br><hr>

</div>
<div class='news_sort'>
TOUS&nbsp;&nbsp;ma région&nbsp;&nbsp;membres&nbsp;&nbsp;politique&nbsp;&nbsp;économie&nbsp;&nbsp;sport&nbsp;&nbsp;culture&nbsp;&nbsp;faits divers
</div>
<br>
<br>
<table>
<td>
<table cellpadding='0' cellspacing='0' class='rss_block'>

<?php 
if(isset($_POST['pulse']))
{
	if($news_exists == 1){
		echo "<span style='color : red'> Vous avez déja pulsé cette news !</span>";}
		
	else if($news_exists == 0){
		echo"<span style='color : red'>Votre news à bien été pulsée !</span>";}
}?>
			<tr>
				<td>
					<div class='block_title'>&nbsp;politique</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php
					$url= 'politique.xml';
					$cat = 'politique';
					
					echo RSS_display($cat, $url, 3);		
					?>
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
			<tr>
				<td>
					<div class='block_title'>&nbsp;économie</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php
					$url= 'economie.xml';
					$cat = 'économie';
					
					echo RSS_display($cat, $url, 3);		
					?>
					
					</div>
				</td>
			</tr>
</table>

</td>
<td>
<?php

	include('modeles/view_all_articles.php');
	
	$req = view_all_article();

	while($data = mysql_fetch_array($req))
	{
		if( $data['type'] == 1)
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
					if(isset($_GET['pseudo'])) echo"<a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					else echo"<a href='index.php?page=profile&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					echo"</div>";
				}
				else
				{
					echo"		&nbsp;".$data['title'];
				}
				
			}
			else
			{
				echo"		&nbsp;".$data['title'];
			}
			echo"</div>";
			echo"		</td><td>	<div class='rate'>";
			if($data['rate'] > 0) echo" + ";
			echo $data['rate'];
			echo "</div></td></tr>";
			echo"	<tr style='background-color: #85c630;'>";
			echo"		<td>";
			echo"		<div class='description_news'>";
			echo"			<a class='news_link' href='".$data['description']."'>&nbsp;&nbsp;lire l'article&nbsp;&nbsp;</a>";
			echo"<span style='color:white'>&nbsp;&nbsp;Pulsé le ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par ".$data['pseudo']."</div>";
			echo"	</span></td>";
			echo"<form action='index.php?page=profile' method='post'/>";
			echo'</form>';
		echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			
			echo"	<td>";
			echo"	<div class='debate'><form action='index.php?page=news' method='POST'/><input type='submit' name='debattre' value='débattre' /></form></div>";
			echo"	<div class='depulse'>&nbsp;";
			echo"	<form action='index.php?page=news' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='hidden' name='DEpulse' value='DEpulse' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
			echo"	<div class='propulse'>&nbsp;";
			echo"	<form action='index.php?page=news' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			echo"</td>";
			echo"</tr>";
			
			echo"</table>";
		}		
		
		else if( $data['type'] == 0)
		{
			echo"<table cellpadding='0' cellspacing='0' class='post_news' >";
			echo"<tr style='height: 32px;'>";
				echo"<td rowspan='1'>";
				echo"<div class='title_post'>";
			if(isset($_SESSION['pseudo']))
			{
				if($data['pseudo'] == $_SESSION['pseudo'])
				{
					echo"<div class='delete_post'>";
					if(isset($_GET['pseudo'])) echo"<a href='index.php?page=news&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					else echo"<a href='index.php?page=news&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					echo"</div>";
				}
				else
				{
					echo"		&nbsp;".$data['title'];
				}
			}
			else{
			echo"		&nbsp;".$data['title'];}
			echo"	</div>";
			echo"	</td>";

			echo"	<td>";
			echo"		<div class='rate'>";
			if($data['rate'] > 0) echo" + ";
			echo $data['rate']."</div>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr style='background-color: #85c630;'>";
			echo"	<td>";
			echo"		<div class='description'>";
			echo $data['description']; 
			echo"		</div>";
			echo"<span style='color:white'>&nbsp;&nbsp;Ecrit le ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par ".$data['pseudo'];
			echo"	</span></td>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"<td>";
						echo"	<div class='debate'><form action='index.php?page=profile' method='POST'/><input type='submit' name='debattre' value='débattre' /></form></div>";
						echo"	<div class='depulse'>&nbsp;";
						echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='hidden' name='DEpulse' value='DEpulse' /><input type='submit' name='DEpulse' value='DEpulse' /></form></div></a>";
						echo"	<div class='propulse'>&nbsp;";
						echo"	<form action='index.php?page=profile' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			echo"</td>";
			echo"</tr>";
			echo"</table>";
			echo"<br>";
		}
		
	}
?>

</td>
<td>
	<table cellpadding='0' cellspacing='0' class='rss_block'>

			<tr>
				<td>
				</td>
				<td>
					<div class='block_title'>&nbsp;sport</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td style='background-color: #85c630;'>
					<div class='block_content_right'>
					<?php
					$url= 'sport.xml';
					$cat = 'sport';
					
					echo RSS_display($cat, $url, 3);		
					?>				
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
			<tr>
			<td>
			</td>
				<td>
					<div class='block_title'>&nbsp;écologie</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td style='background-color: #85c630;'>
					<div class='block_content_right'>	
					
					<?php
					$url= 'ecologie.xml';
					$cat = 'écologie';
					
					echo RSS_display($cat, $url, 3);		
					?>					
					</div>
				</td>
			</tr>
</table>
</td>
</table>