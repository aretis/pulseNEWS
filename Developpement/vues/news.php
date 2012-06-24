
<?php
	include('modeles/pulse.php');
	
	if(isset($_SESSION['pseudo']))
	{
		if(isset($_GET['PROpulse']))
		{
		
			pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['PROpulse']);
		}
		else if(isset($_GET['DEpulse']))
		{
		
			pulse($_GET['id_news'], $_SESSION['id_user'], $_GET['DEpulse']);
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
		document.getElementById("cat").style.display = "inline";
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




<div id="volet_clos">
		<div id="volet">
		<div class='tri'>
	<div class='shorti'>Trier par : </div>
	<br>
	<form method='post' action='index.php?page=news'>
	
	<SELECT id='date' name='date' selected='selected' onchange='change2(this.selectedIndex)'>
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
		<option value='1'>News rédigé</option>
		<option value='2'>News pulsé</option>
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
	</SELECT><div> <input name='tri' type='submit' value='trier' /></div>
	
	
</form>
</div>
		
		
	
		
			<div class='search_news'>
			<div class='shorti'>Rechercher : </div>
	<form method="post" action="index.php?page=news">
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
		<input type="submit" value ="rechercher" name ="rechercher"/>
	</form>

</div>
			
			<a href="#volet" class="ouvrir" aria-hidden="true">Trier !</a>
			<a href="#volet_clos" class="fermer" aria-hidden="true">Fermer</a>
		</div>
	</div>


<br>
<br>
<table>
<td style='vertical-align: top; width:20%'>
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
					<div class='block_title'>&nbsp;économie</div>
				</td>
			</tr>
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
			
</table>

</td>
<td>
<?php if((!isset($_POST['recherche'])) || (empty($_POST['recherche'])) || $nb_resultats == 0) {?>
<div id='pardessus'>
<?php

	include('modeles/view_all_articles.php');
	
	$req = view_all_article($date, $rate, $type, $news_area, $cat_news);

	while($data = mysql_fetch_assoc($req))
	{
		if($data['type'] == 1)
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
					if(isset($_GET['pseudo'])) echo"<a  style='color:red' href='index.php?page=news&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					else echo"<a style='color:red' href='index.php?page=news&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
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
			
			/* -----------------------------------------
			// COULEUR DU ECRIT LE ....
			---------------------------------------*/
			
			echo"	<tr style='background-color: #58b54c;'>";
			echo"		<td>";
			echo"		<div class='description_news'>";
			echo"<a href=\"".$data['description']."\" >
				<img id=\"myDiv\" src='design/img/news_1.png' 
				onmouseover=\"this.src='design/img/news_2.png';\" 
				onmouseout=\"this.src='design/img/news_1.png';\"/>
			</a>";
			
			echo"<span style='color:white;'>&nbsp;&nbsp;Pulsé le ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par <a style='color:white;' href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>! </div>";
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
				
				echo"<a href=\"index.php?page=news&id_news=".$data['id_post']."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&id_news=".$data['id_post']."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
			}
			
			$query = 'SELECT cat_name FROM news_cat WHERE id_cat ='.$data['cat'];
			$result = call_db($query);

			while($toto = mysql_fetch_assoc($result))
			{
				echo $toto['cat_name'];
			}
			echo"</td>";
			
			echo"</tr>";
			
			echo"</table>";
			echo"<br>";
		}		
		else if($data['type'] == 0)
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
					if(isset($_GET['pseudo'])) echo"<a style='color:red' href='index.php?page=news&pseudo=".$_GET['pseudo']."&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;".$data['title'];
					else echo"<a style='color:red' href='index.php?page=news&delete_post=".$data['id_post']."'>X</a>&nbsp;&nbsp;";
					echo"<a href='index.php?page=view_article&id_post=".$data['id_post']."' style='color: white;'>".$data['title']."</a>";
					echo"</div>";
				}
				else
				{
					echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."' style='color: white;'>".$data['title']."</a>";
				}
			}
			else{
			echo"		&nbsp;<a href='index.php?page=view_article&id_post=".$data['id_post']."' style='color: white;'>".$data['title']."</a>";}
			echo"	</div>";
			echo"	</td>";

			echo"	<td>";
			echo"		<div class='rate'>";
			if($data['rate'] > 0) echo" + ";
			echo $data['rate']."</div>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"	<td>";
			echo"		<div class='description'>";
			echo $data['description']; 
			echo"		</div>";
			/* -----------------------------------------
			// COULEUR DU ECRIT LE ....
			---------------------------------------*/
			echo"<span style='color:white;background-color: #58b54c;'>&nbsp;&nbsp;Ecrit le ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par <a href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>!";
			echo"	</span></td>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"<td>";
			if(isset($_SESSION['pseudo']))
			{
				echo"	<div class='depulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&id_news=".$data['id_post']."&DEpulse=DEpulse\" >
					<img id=\"myDiv\" src='design/img/down.png' 
					onmouseover=\"this.src='design/img/down_plein.png';\" 
					onmouseout=\"this.src='design/img/down.png';\"/>
				</a></div>";
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=news&id_news=".$data['id_post']."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
			}
			$query = 'SELECT cat_name FROM news_cat WHERE id_cat ='.$data['cat'];
			$result = call_db($query);

			while($toto = mysql_fetch_assoc($result))
			{
				echo $toto['cat_name'];
			}
			echo"</td>";
			
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
					<div class='block_title'>&nbsp;sport</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class='block_content_right'>
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
					<div class='block_title'>&nbsp;écologie</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class='block_content_right'>	
					
					<?php
					$url= 'ecologie.xml';
					$cat = 3;
					
					echo RSS_display($cat, $url, 3);		
					?>					
					</div>
				</td>
			</tr>
	
</table>
</td>
</table>