
<?php
//-----------------------------------------------------------------------------------------
//
//christie bunlon
//
//fonction qui permet de faire apparaitre un certain nombre de caracteres d'un contenu de 
//-----------------------------------------------------------------------------------------------
function couperChaine($chaine, $nbrMotMax)
{
	$chaineNouvelle= "";
	$t_chaineNouvelle = explode(" ",$chaine);
	
	foreach($t_chaineNouvelle as $cle => $mot)
	{
		if($cle < $nbrMotMax)
		{
			$chaineNouvelle .= $mot." ";
		}
	}
	return $chaineNouvelle;
}


?>
