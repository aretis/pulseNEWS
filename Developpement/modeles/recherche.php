<?php
include('modeles/connect_db.php');
	mysql_query("SET NAMES 'utf8'");
if ((isset($_POST['recherche']) && !empty($_POST['recherche'])))
{
	if(isset($_POST['recherche']))
	{
		$recherche = mysql_real_escape_string(htmlspecialchars($_POST['recherche'])); 
	
	}
	
	if(isset($_GET['recherche']))
	{
		$recherche = mysql_real_escape_string(htmlspecialchars($_GET['recherche'])); 
		
	}
    $mode = "exp_exacte";

    if ($mode == "exp_exacte")
    {
        $liaison = 'AND'; 
    } 
    else
    {
        $liaison = 'OR';
    }
	  
    if ($mode == "exp_exacte") 
    {
		
        $req = mysql_query('SELECT * FROM posts NATURAL JOIN users WHERE type != 3 AND title LIKE \'%'.$recherche.'%\' OR content  LIKE \'%'.$recherche.'%\'');
		
		
    }
    else 
    {
        $mots = explode(" ", $recherche); 
        $nombre_mots = count ($mots); 
		$valeur_requete='';

        for($nb_boucle = 0; $nb_boucle < $nombre_mots; $nb_boucle++) 
        {
            $valeur_requete .= '' . $liaison . ' content LIKE \'%' . $mots[$nb_boucle] . '%\''; 
        }
    
        $valeur_requete = ltrim($valeur_requete,$liaison);
        $req= mysql_query("SELECT * FROM posts NATURAL JOIN users WHERE type != 3  AND title LIKE  OR content  LIKE \'%'.$recherche.'%\''$valeur_requete"); 
    }
        $req = mysql_query('SELECT * FROM posts NATURAL JOIN users WHERE type != 3 AND title LIKE \'%'.$recherche.'%\' OR content  LIKE \'%'.$recherche.'%\'');
    
	if($req === false)
	{
		
		$nb_resultats = 0;
	}
	else
	{
		
		$nb_resultats = mysql_num_rows($req);
	}

    if ($nb_resultats == 0) 
    {
        echo '<div id="box">Aucun résultat</div>';
    }
	
	else
	{
		if($nb_resultats==1)
		{
			echo"<div id='box'>1 résultat a été trouvé<br></div>";
		}
		else if($nb_resultats > 1)
		{
			echo'<div id="box">'.$nb_resultats.' résultats ont été trouvés</div>';
		}
		
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
			
		}
	}	
?>