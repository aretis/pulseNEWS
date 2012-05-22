<?php

include("connexion.php");
if (isset($_POST['recherche']) || isset($_GET['recherche']))
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
		$categorie= mysql_real_escape_string(htmlspecialchars($_POST['categorie']));
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
        $requete = mysql_query('SELECT * FROM posts WHERE content LIKE \'%'.$recherche.'%\'');
		
		
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
			echo"Il n'y a 1 résultat qui correspond a votre recherche";
		}
		else if($nb_resultats > 1)
		{
			echo' Il y a '.$nb_resultats.' résultats qui correspondent à votre recherche';
		}
		while($resultats = mysql_fetch_array($requete) )
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
			<div class='rate'>+128</div>
		</td>
		</tr>
		<tr style='background-color: #85c630;'>
		<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
		</td>
		</div>
		</td>
			<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
		</td>

	</tr>
	<tr>
	<td>
		<a href='index.php?page=voir_article&id=".$resultats['id']."&recherche=".$recherche."&mode=".$mode."&categorie=".$categorie."'><div class='comment_button'>lire l'article!</div></a>
		<div style='float: right; width: 5%px;'>&nbsp;</div>
	</td>
	</tr>
	</table>"; 

			}
			
		}
	}	

else if ((empty($recherche)) && (!isset($recherche)))
{
 echo'Veuillez saisir une recherche!';
}
else
{

}
?>