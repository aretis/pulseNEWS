<?php
/* Fonction qui s'occupe de gérer le PROpulse et le DEpulse
	Note de l'article
	07/05/2012
	Salman ALAMDAR */

	include('Funct_pro_de_pulse.php');
	
	$id_post == 12;
	
	if(isset($_GET['PROpulse']))
	{
		$post_rating = pulse($id_post, $_GET['PROpulse']);
	}
	else if(isset($_GET['DEpulse']))
	{
		$post_rating = pulse($id_post, $_GET['DEpulse']);
	}
	
	
?>	
	<form action='pro_de_pulse.php' method='GET'/>

	<input type='submit' name='PROpulse' value='PROpulse' />
	
	</form>
	
	<form action='pro_de_pulse.php' method='GET'/>

	<input type='submit' name='DEpulse' value='DEpulse' />
	
	</form>

	<?php
	if(isset($_GET['PROpulse']) || isset($_GET['DEpulse']))
	{
		echo $post_rating;
	}
	?>
	