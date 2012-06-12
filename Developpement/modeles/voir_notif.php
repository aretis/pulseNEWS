<?php
	include('connexion.php');

	$query = "SELECT id_pulseur, count(id_pulseur) AS nb_notif FROM notification WHERE  id_pulseur = ".$_SESSION['id_user']." AND id_user != ".$_SESSION['id_user']."";
	if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
			
	/*echo"<br>
	<br>
	<br>
	<br>
	<table align=center border='2px' bordercolor='#85C630'>
	<caption>  NOTIFICATIONS<caption/>";*/
	$sucess= mysql_query($query) or die (mysql_error());
	while($resultats=mysql_fetch_assoc($sucess))
	{
		
		$requete="SELECT * FROM notification N JOIN comments C ON N.id_comment = C.id_comment JOIN users U ON C.id_user=U.id_user  WHERE N.id_user != ".$_SESSION['id_user']." AND read_confirm='0'" ;
		$sucess=mysql_query($requete) or die(mysql_error());
		While($resultats=mysql_fetch_array($sucess))
		{
			
			echo" <br> <br> 
	
	<table width = 60% cellpadding='3' cellspacing='3' class='notif' >
	<tr style='height: 12px'width=60%>

		</tr>
		<tr style='background-color: #85c630;'>
		<td>
		<div class='description'>
		 ".$resultats['pseudo']." a commenté votre post:</br>";
		
		$chaine_nouvelle=couperChaine($resultats['content'],10);
		echo $chaine_nouvelle;
		echo"		
		</div>
		</td>
		</div>
		</td>
			<td style='background-color: white;'>
		<div class='date_notif'>
		".$resultats['post_date']."
		</div>
		
		</td>

	</tr>
	<tr>
	<td>
		<a href='index.php?page=view_article&id_post=".$resultats['id_post']."'><div class='comment_button'>voir</div></a>
		<div style='float: right; width: 5%px;'>&nbsp;</div>
	</td>
	</tr>
	</table>
	<br>"; 

		}		
		
		
		
			/*echo"
			<tr>
			<td>
			 ".$resultats['pseudo']." a commenter votre post ".$resultats['content']." 
			 
			</tr>
			</td>";*/
		}
	
	
	

?>