<?php
/* Fonction qui s'occupe de g�rer le PROpulse et le DEpulse
	Note de l'article
	07/05/2012
	Salman ALAMDAR */

	include('pulse.php');
	

	if(isset($_POST['PROpulse']))
	{
		$post_rating = pulse($_POST['id_post'], $_SESSION['$id_user'], $_GET['PROpulse']);
	}
	else if(isset($_POST['DEpulse']))
	{
		$post_rating = pulse($_POST['id_post'], $_SESSION['$id_user'], $_GET['DEpulse']);
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
	