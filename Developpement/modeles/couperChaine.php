<?php

function couperChaine($chaine, $nbrMotMax)
{
	$chaineNouvelle = "";
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
