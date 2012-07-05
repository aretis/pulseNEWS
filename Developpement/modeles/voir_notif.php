<div id="page-wrap">
<?php

	if(isset($_GET['id_comment'])) 
	{
		$requete="DELETE FROM notification WHERE id_comment = ".$_GET['id_comment']."";
		$sucess=mysql_query($requete) or die(mysql_error());
		echo "<div id='box'> La notification a bien été supprimée</div>";
	}
	
	$read_confirm='1';
	
	include('modeles/call_db.php');
	include('modeles/couperChaine.php');

	$request2 ="SELECT id_comment,type_de_notif FROM notification";
	
	$data2 = mysql_query($request2);
	
	if($data2 === false)	
	{
		echo "La requête est incorrect<br />".htmlentities($request2).'<br />'.mysql_error();
		return;
	}

	while($toto = mysql_fetch_array($data2))
	{
	
		
		$id=$toto['id_comment'];
		if($toto['type_de_notif'] == 1)
		{
		
			$requete = "SELECT * FROM notification N
			NATURAL JOIN users
			JOIN comments C ON C.id_comment = N.id_comment
			WHERE N.id_user != ".$_SESSION['id_user']." 
			AND N.id_pulseur =".$_SESSION['id_user']." AND  N.id_comment=".$id." AND type_de_notif = 1 ORDER BY N.date_notif DESC";
		}
		else
		{
			$requete = "SELECT * FROM notification N
			NATURAL JOIN users
			JOIN comment_a_comment CAC ON CAC.id_comment = N.id_comment
			WHERE N.id_user != ".$_SESSION['id_user']." 
			AND N.id_pulseur =".$_SESSION['id_user']." AND N.id_comment=".$id." AND type_de_notif = 2 ORDER BY N.date_notif DESC";
		}
		
	$data = mysql_query($requete);
	
	if($data === false)	
	{
		
		echo "La requête est incorrect<br />".htmlentities($requete).'<br />'.mysql_error();
		return;
		
	}
	$result = mysql_fetch_array($data);
	$nb_notif= mysql_num_rows($data);
	
	if ($nb_notif != 0)
	{
	/* ENLEVER DE COMMENTAIRE POUR DEBUGGER
	if($result === false)
	{	
	die('En fait, la requête est vide, il ny a pas de resultat');
	}*/

		echo'<section class="slide-up-boxes">';


		
		if($result['read_confirm'] == 0)
		{


			echo"<a style='background-color:#8bb8c6;' href='index.php?page=view_article&id_post=".$result['id_post']."&read_confirm=".$read_confirm."&id_comment=".$result['id_comment']."'>"; ?>
			<h5>
			<?php
		
			if($result['type_de_notif']== 1)
			{
			echo "".$result['pseudo']." a commenté votre post!" ;
			//echo '<style= background-position:right '.$result['
			}
			else
			{
			echo"".$result['pseudo']." a répondu a votre commentaire! ";
			}
			echo"</h5>";?>
				<div >
					<section id = 'photos_user' '>
		
		
			<?php
			if (empty($result['profile_picture']))
			{
				echo"<img  src='design/img/exemple_profile.jpg' />";
			}
			else
			{
			
				$image = imagecreatefromstring($result['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
	
			}
			
				echo"</ class='user_link' style=\";widht:10px height: 10px; bottom: 5px; left: 5px; z-index: 2; border: none !important;\"/></style>";
				echo"</section>";
			$chaine = $result['content'];
			couperChaine($chaine,10);
			$chaineNouvelle=couperChaine($chaine,10);
			echo "<div id='notif_text'>".$chaineNouvelle."</div>";
			?>
		</div>

		</a>
		
			<?php
	
		}		
		else
		{

			echo"<a style='background-color:#d5e5ea;' href='index.php?page=view_article&id_post=".$result['id_post']."&read_confirm=".$read_confirm."&id_comment=".$result['id_comment']."'>"; ?>
	<h5>
			<?php

			if($result['type_de_notif']== 1)
			{
			echo "".$result['pseudo']." a commenté votre post!" ;
			//echo '<style= background-position:right '.$result['
			}
			else
			{
			echo"".$result['pseudo']." a répondu a votre commentaire! ";
			}
			echo"</h5>";?>
				<div >
					<section id = 'photos_user' '>
		
			<?php
			if (empty($result['profile_picture']))
			{
				echo"<img  src='design/img/exemple_profile.jpg' />";
			}
			else
			{
				
				$image = imagecreatefromstring($result['profile_picture']);
				ob_start();
				imagejpeg($image, null, 80);
				$img = ob_get_contents();
				ob_end_clean();
				echo '<img src="data:image/jpg;base64,' .  base64_encode($img)  . '" />';
	
			}
			
				echo"</ class='user_link' style=\";widht:10px height: 10px; bottom: 5px; left: 5px; z-index: 2; border: none !important;\"/></style>";
				echo"</section>";

			$chaine = $result['content'];
			couperChaine($chaine,10);
			$chaineNouvelle=couperChaine($chaine,10);
			echo "<div id='notif_text'>".$chaineNouvelle."</div>";

			
			echo"</div>";
			echo"</a>";
			
echo"<a id='supprimer_notif' href='index.php?page=voir_notif&id_comment=".$result['id_comment']."'> X </a>";
		}
	}
	
	}
	
?>

			
	</div>
</body>
</html>
