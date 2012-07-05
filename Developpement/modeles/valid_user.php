<?php
	include('modeles/connect_db.php');
	$prenom = $_SESSION['pseudo'];
	if(isset($_POST['password']))
	{
		$requete="SELECT password FROM users WHERE pseudo='".$prenom."'";
		$sucess=mysql_query($requete)or die(mysql_error());
		while ( $resultat=mysql_fetch_assoc($sucess))
		{
			if (($_POST['password']) == $resultat['password'])
			{
			?>
				<script language="Javascript">
					document.location.replace("index.php?page=modifier_compte");
				</script>
				<?php
			}
			else 
			{
				echo "<div id='box'>Votre mot de passe est incorrect !</div>";
			}
		}
	}
?>