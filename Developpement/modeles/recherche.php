<?php
include("connexion.php");
	mysql_query("SET NAMES 'utf8'");
if ((isset($_POST['recherche']) && !empty($_POST['recherche']))||( isset($_GET['recherche'])  && !empty($_GET['recherche'] )))
{
	if(isset($_POST['recherche']))
	{
		$recherche = mysql_real_escape_string(htmlspecialchars($_POST['recherche'])); 
		$mode = mysql_real_escape_string(htmlspecialchars($_POST['mode']));
		$categorie= mysql_real_escape_string(htmlspecialchars($_POST['categorie']));
	}
	
	if(isset($_GET['recherche']))
	{
		$recherche = mysql_real_escape_string(htmlspecialchars($_GET['recherche'])); 
		$mode = mysql_real_escape_string(htmlspecialchars($_GET['mode']));
		$categorie= mysql_real_escape_string(htmlspecialchars($_GET['categorie']));
	}
    
    if ($mode == "exp_exacte")
    {
        $liaison = 'AND'; 
    } 
    else
    {
        $liaison = 'OR';
    }
	  
    if ($mode == "expression_exacte") 
    {
		echo $recherche;
        $requete = mysql_query('SELECT * FROM posts WHERE content AND title LIKE \'%'.$recherche.'%\'');
		
		
    }
    else 
    {
        $mots = explode(" ", $recherche); 
        $nombre_mots = count ($mots); 
        $valeur_requete = '';

        for($nb_boucle = 0; $nb_boucle < $nombre_mots; $nb_boucle++) 
        {
            $valeur_requete .= '' . $liaison . ' content LIKE \'%' . $mots[$nb_boucle] . '%\''; 
        }
        
        $valeur_requete = ltrim($valeur_requete,$liaison);
        $requete= mysql_query("SELECT * FROM posts WHERE $valeur_requete"); 
    }
    
    $nb_resultats = mysql_num_rows($requete);
	

    if ($nb_resultats == 0) 
    {
        echo 'Aucun résultat.';
    }
	
	else
	{
		if($nb_resultats==1)
		{
			echo"Il y a 1 résultat qui correspond a votre recherche";
		}
		else if($nb_resultats > 1)
		{
			echo' Il y a '.$nb_resultats.' résultats qui correspondent à votre recherche';
		}
		while($resultats = mysql_fetch_array($requete))
		{
		
			echo"  </td>
	<td>
	<table cellpadding='0' cellspacing='0' class='post_news' >
	<tr style='height: 32px;'>
		<td rowspan='1'>
		<div class='title_post'>
		&nbsp;Nom du journal: ".$resultats['title']."
		
		</div>
		</td>

		<td>
			<div class='rate'>".$resultats['rate']."</div>
		</td>
		</tr>
		<tr style='background-color: #85c630;'>
		<td>
		<div class='description'>";
					$chaine = $resultats['content'];
					couperChaine($chaine,20);
					$chaineNouvelle=couperChaine($chaine,20);
					echo $chaineNouvelle;
					
		echo"</div>
		</td>
		</div>
		</td>
			<td style='background-color: white;'>
		<div class='date_news'>
		".$resultats['post_date']."
		</div>
		
		</td>

	</tr>
	<tr>
	<td>
		<a href='index.php?page=voir_article&id=".$resultats['id_post']."&recherche=".$recherche."&mode=".$mode."&categorie=".$categorie."'><div class='comment_button'>lire l'article!</div></a>
		<div style='float: right; width: 5%px;'>&nbsp;</div>
	</td>
	</tr>
	
	</table>
	</br>
	"; 

			}
			
		}
	}	



else if (empty($_POST['recherche']))
{
	echo'veuillez saisir une recherche!';
}
?>