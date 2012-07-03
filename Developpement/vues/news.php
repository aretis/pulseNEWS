
<?php

	if(isset($_POST['comment']))
		{
			include('modeles/save_comment.php');
			save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['comment']);
		}
		else if(isset($_POST['comment_a_comment']))
		{	
			include('modeles/save_comment_comment.php');
			save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['id_parent'], $_POST['comment_a_comment']);
		}	if(isset($_GET['delete_comment'])) include('modeles/delete_comment.php');

		else if(isset($_GET['delete_comment_of_comment'])) include('modeles/delete_comment_of_comment.php');
	
	
	include('modeles/pulse.php');
	
	
	if(isset($_SESSION['pseudo']))
	{
		if(isset($_GET['PROpulse']))
		{
		
			pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['PROpulse'], $_GET['type']);
		}
		else if(isset($_GET['DEpulse']))
		{
		
			pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['DEpulse'], $_GET['type']);
		}
	}
	
		$date = 0;
		$rate = 0;
		$type = 0;
		$news_area = 0;
		$cat_news = 0;
	if(isset($_POST['tri']))
	{
		
		if($_POST['date'] == 1) $date = 1;
		else if($_POST['date'] == 2) $date = 2;
		
		if($_POST['rate'] == 1) $rate = 1;
		else if($_POST['rate'] == 2) $rate = 2;
		
		if($_POST['type'] == 1) $type = 1;
		else if($_POST['type'] == 2) $type = 2;

		if($_POST['area'] != "Région") 
		{
			$news_area = $_POST['area'];
			echo'<style> #area{display:inline;} </style>';
		}
		
		if($_POST['cat'] != "Catégorie") 
		{
			$cat_news = $_POST['cat'];
			echo'<style> #cat{display:inline;} </style>';
		}
	}
?>
<SCRIPT text='JAVASCRIPT'>

function change(num) 
{
	if(num == 0)
	{
		document.getElementById("cat").style.display = "none";
		document.getElementById("area").style.display = "none";
	}
	else if(num == 1)
	{
		document.getElementById("cat").style.display = "none";
		document.getElementById("area").style.display = "inline";
	}
	else if(num == 2)
	{
		document.getElementById("area").style.display = "none";
		document.getElementById("cat").style.display = "inline";
	}
}

function change2(num) 
{
	if(num == 0)
	{
		document.getElementById("date").style.display = "inline";
		document.getElementById("rate").style.display = "inline";
	}
	else
	{
		document.getElementById("rate").style.display = "none";
		document.getElementById("date").style.display = "inline";
	}
}
function change3(num) 
{
	if(num == 0)
	{
		document.getElementById("date").style.display = "inline";
		document.getElementById("rate").style.display = "inline";
	}
	else
	{
		document.getElementById("date").style.display = "none";
		document.getElementById("rate").style.display = "inline";
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
			$query='INSERT INTO posts VALUES ("", "'.$_SESSION['id_user'].'", "1", "'.mysql_real_escape_string($_POST['title']).'", "'.$_POST['link'].'", "", "'.$_POST['cat'].'", "0", NOW(), "0")';
			
			if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
		}
	}
?>


<table>
<td style='vertical-align: top; width:20%'>
<table cellpadding='0' cellspacing='0' class='rss_block'>

<?php 
if(isset($_POST['pulse']))
{
	if($news_exists == 1){
		echo "<div id='box'> Vous avez déja pulsé cette news !</div>";}
		
	else if($news_exists == 0){
		echo"<div id='box'>Votre news à bien été pulsée !</div>";}
}?>

			<tr>
				<td>
					<div class='block_title'>politique</div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>
					<?php
					$url= 'politique.xml';
					$cat = 1;
					
					echo RSS_display($cat, $url, 3);		
					?>
					</div>
				</td>
			</tr>
		
		
			<tr style='height: 25px;'>
			</tr>
			<tr>
				<td>
					<div class='block_title'>économie</div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>
					<?php
					$url= 'economie.xml';
					$cat = 2;
					
					echo RSS_display($cat, $url, 3);		
					?>
					
					</div>
				</td>
			</tr>
			
			<tr style='height: 25px;'>
			</tr>
	
			<tr>
				<td>
					<div class='block_title'>people</div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>	
					
					<?php
					$url= 'people.xml';
					$cat = 8;
					
					echo RSS_display($cat, $url, 3);		
					?>					
					</div>
				</td>
			</tr>
			
</table>

</td>
<td>



<div id="wrapper">
<div class='tri_news'>
		<div class="accordionButton3">Trier les informations</div>
		<div class="accordionContent3">
		<div class='tri'>
	<br><div class='shorti'>Trier par : </div>
	<form method='post' action='index.php?page=news'>
	
	<br><SELECT id='date' name='date' selected='selected' onchange='change2(this.selectedIndex)'>
		<option value='0'>Date</option>
		<option value='1'>Les plus récentes</option>
		<option value='2'>Les moins récentes</option>
	</SELECT>
	
	<SELECT id='rate' name='rate' selected='selected' onchange='change3(this.selectedIndex)'>
		<option value='0'>Note</option>
		<option value='1'>Le top</option>
		<option value='2'>Le flop</option>
	</SELECT>

	<SELECT name='type' selected='selected' onchange='change(this.selectedIndex)'>
		<option value='0'>Type de News</option>
		<option value='1'>News rédigée</option>
		<option value='2'>News pulsée</option>
	</SELECT>

	<SELECT id='area' name='area' selected='selected'>
	<option>Région</option>
		<?php

			$query = 'SELECT area_name FROM areas';
			$result = call_db($query);

			while($data = mysql_fetch_array($result))
			{
				echo'<option>'.$data['area_name'].'</option>';
			}

			mysql_free_result($result);
			mysql_close($link);
		?>
	</SELECT>


	<SELECT id='cat' name='cat' selected='selected'>
	<option>Catégorie</option>
		<?php

			$query = 'SELECT cat_name FROM news_cat';
			$result = call_db($query);

			while($data = mysql_fetch_array($result))
			{
				echo'<option>'.$data['cat_name'].'</option>';
			}

			mysql_free_result($result);
			mysql_close($link);
		?>
	</SELECT><div class='link_submit' style='text-align: right;'> <input name='tri' type='submit' value='trier' /></div>
	
	
</form>
</div>
		
		<hr>
	
		
			<br><div class='search_news'>
			<div class='shorti'>Rechercher : </div>
	<br><form method="post" action="index.php?page=news">
		<input type="search"name="recherche"/>
		<select name ="mode">
			<option value="exp_exacte">l'expression exacte</option>
			<option value="all_mots">tout les mots </option>
			<option value="un_mot">Au moins un mot</option>
		</select>
		<SELECT name="categorie">
			<?php
				$query = 'SELECT cat_name FROM news_cat';
				$result = call_db($query);

				while($data = mysql_fetch_assoc($result))
				{
					echo'<option>'.$data['cat_name'].'</option>';
				}
				
				mysql_free_result($result);
				mysql_close($link);
			?>
		</select>
		<div class='link_submit' style='text-align: right;'><input type="submit" value ="rechercher" name ="rechercher"/></div>
	</form>

</div>
			
		
		</div>

	</div>
</div>
<br>


<?php
	if(isset($_POST['recherche']) && empty($_POST['recherche'])) echo"<div id='box'> Vous n'avez pas entré de recherche ! </div>";
	else if(isset($_POST['recherche']) && (!empty($_POST['recherche'])))
	{
		include('modeles/recherche.php');
	}
?>
<?php if((!isset($_POST['recherche'])) || (empty($_POST['recherche'])) || $nb_resultats == 0) {?>
<div id='pardessus'>
<?php




	include('modeles/view_all_articles.php');

	$req = view_all_article($date, $rate, $type, $news_area, $cat_news);
	
	while($post_data = mysql_fetch_assoc($req))
	{
	
	$id = $id_post = $post_data['id_post'];
	
		if($post_data['type'] == 1)
		{
			
	
			echo"		<table cellpadding='0' cellspacing='0' class='post_news' >";
			echo"		<tr style='height: 32px;'>";
			echo"		<td rowspan='1'>";
			echo"		<div class='title_post'>";
			if(isset($_SESSION['pseudo']))
			{
				if($post_data['pseudo'] == $_SESSION['pseudo'])
				{
					echo"<div class='delete_post'>";
					if(isset($_GET['pseudo'])) echo"<a style='color:red' href='index.php?page=news&pseudo=".$_GET['pseudo']."&delete_post=".$post_data['id_post']."'>X</a>&nbsp;&nbsp;".$post_data['title'];
					else echo"<a style='color:red' href='index.php?page=news&delete_post=".$post_data['id_post']."'>X</a>&nbsp;&nbsp;&nbsp;<a href='index.php?page=view_article&id_post=".$post_data['id_post']."'>".$post_data['title']."</a>";;
					echo"</div>";
				}
				else
				{
					echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$post_data['id_post']."'>".$post_data['title']."</a>";
				}
				
			}
			else
			{
				echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$post_data['id_post']."'>".$post_data['title']."</a>";
			}
			echo"<div class='rate'>";
			if($post_data['rate'] > 0) echo"+";
			echo $post_data['rate'];
			echo "</div>";
			echo"</div></td>";
			echo"	</tr><tr><td>";
			
			echo"		<div class='description_news'>";
			echo"<a href=\"".$post_data['description']."\" >
				<img id=\"myDiv\" src='design/img/news_1.png' 
				onmouseover=\"this.src='design/img/news_2.png';\" 
				onmouseout=\"this.src='design/img/news_1.png';\"/>
			</a>";
			
			echo"<span>&nbsp;&nbsp;Pulsé le ";
			echo date("d/m/Y à H\hi", strtotime($post_data['post_date']));
			echo"&nbsp;par <a style='color: black;' href='index.php?page=profile&pseudo=".$post_data['pseudo']."'>".$post_data['pseudo']." </a>! </div>";
			
			include('modeles/comment.php');
			
			echo"	</span></td>";
			echo"<form action='index.php?page=profile' method='post'/>";
			echo'</form>';
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			
			echo"	<td>";
			if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&type=posts&id_news=".$post_data['id_post']."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&type=posts&id_news=".$post_data['id_post']."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div><div class='cat_news'>";
			}
			
			$query = 'SELECT cat_name FROM news_cat WHERE id_cat ='.$post_data['cat'];
			$result = call_db($query);

			while($toto = mysql_fetch_assoc($result))
			{
				echo $toto['cat_name'];
			}
			echo"</div></td>";
			
			echo"</tr>";
			
			echo"</table>";
			echo"<br>";
		}		
		else if($post_data['type'] == 0)
		{
		
	
			echo"<table cellpadding='0' cellspacing='0' class='post_news' >";
			echo"<tr style='height: 32px;'>";
				echo"<td rowspan='1'>";
				echo"<div class='title_post'>";
			if(isset($_SESSION['pseudo']))
			{
				if($post_data['pseudo'] == $_SESSION['pseudo'])
				{
					echo"<div class='delete_post'>";
					if(isset($_GET['pseudo'])) echo"<a style='color:red' href='index.php?page=news&pseudo=".$_GET['pseudo']."&delete_post=".$post_data['id_post']."'>X</a>&nbsp;&nbsp;".$post_data['title'];
					else echo"<a style='color:red' href='index.php?page=news&delete_post=".$post_data['id_post']."'>X</a>&nbsp;&nbsp;";
					echo"<a href='index.php?page=view_article&id_post=".$post_data['id_post']."'>".$post_data['title']."</a>";
					echo"</div><br>";
				}
				else
				{
					echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$post_data['id_post']."'>".$post_data['title']."</a>";
				}
			}
			else{
			echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$post_data['id_post']."'>".$post_data['title']."</a>";}
			echo"<div class='rate'>";
			if($post_data['rate'] > 0) echo"+";
			echo $post_data['rate'];
			echo "</div>";
			echo"	</div>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"	<td>";
			echo"		<br><div class='description'>";
			echo $post_data['description']; 
			echo"		</div>";
			echo"<span class='info_post'>&nbsp;&nbsp;<br>Ecrit le ";
			echo date("d/m/Y à H\hi", strtotime($post_data['post_date']));
			echo"&nbsp;par <a style='color: black;' href='index.php?page=profile&pseudo=".$post_data['pseudo']."'>".$post_data['pseudo']." </a>!";
			
			include('modeles/comment.php');
			
			echo"	</span></td>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"<td>";
			if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&type=posts&id_news=".$post_data['id_post']."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&type=posts&id_news=".$post_data['id_post']."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div><div class='cat_news'>";
				
			}
			$query = 'SELECT cat_name FROM news_cat WHERE id_cat ='.$post_data['cat'];
			$result = call_db($query);

			while($toto = mysql_fetch_assoc($result))
			{
				echo $toto['cat_name'];
			}
			
			echo"</div></td>";
			
			echo"</tr>";
			
			echo"</table>";
			echo"<br>";
		}
		
	}
	if(mysql_num_rows($req) == 0)
	{
		echo"<div class='no_news'> Désolé, aucune news n'a été trouvée pour ces critères</div>";
	}
}?>
</div>
</td>
<td style='vertical-align: top;'>
	<table cellpadding='0' cellspacing='0' class='rss_block' >

			<tr>
				<td>
					<div class='block_title'>sport</div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>
					<?php
					$url= 'sport.xml';
					$cat = '5';
					
					echo RSS_display($cat, $url, 3);		
					?>				
					</div>
				</td>
			</tr>
	
			<tr style='height: 25px;'>
			</tr>
	
			<tr>
				<td>
					<div class='block_title'>écologie</div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>	
					
					<?php
					$url= 'ecologie.xml';
					$cat = 3;
					
					echo RSS_display($cat, $url, 3);		
					?>					
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
	
			<tr>
				<td>
					<div class='block_title'>insolite</div>
				</td>
			</tr>
			<tr><td><hr></td></tr>
			<tr>
				<td>
					<div class='block_content'>	
					
					<?php
					$url= 'insolite.xml';
					$cat = 7;
					
					echo RSS_display($cat, $url, 3);		
					?>					
					</div>
				</td>
			</tr>
	
</table>


</td>
</table>