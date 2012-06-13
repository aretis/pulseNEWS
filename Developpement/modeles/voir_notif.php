<html>
<body>
<link rel="stylesheet" href="design/profile1.css" />

﻿<?php
	if(isset($_GET['delete_notif'])) 
	{
	$requete="DELETE FROM notification WHERE id_comment = ".$_GET['delete_notif']."";
	$sucess=mysql_query($requete) or die(mysql_error());
	echo "la notification a bien été supprimée";
	
	}
	
	$read_confirm='1';
	include('connexion.php');

	$query = "SELECT id_pulseur, count(id_pulseur) AS nb_notif FROM notification WHERE  id_pulseur = ".$_SESSION['id_user']." AND id_user != ".$_SESSION['id_user']." AND  read_confirm='0'";
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


		$requete="SELECT * FROM notification N 
						JOIN comments C ON N.id_comment = C.id_comment 
						JOIN users U ON C.id_user=U.id_user 
						WHERE  N.id_user != ".$_SESSION['id_user']." 
						AND  id_pulseur =".$_SESSION['id_user']." ";
						
						/*AND WHERE N.id_post=(SELECT N.id_post FROM notification 
						WHERE N.id_user=".$_SESSION['id_user'].")
						ORDER BY post_date DESC ";*/
						
						//SELECT * FROM notification WHERE 
						/*UNION ALL  (SELECT content FROM comments C 
						JOIN notification N ON C.id_comment = N.id_comment
						WHERE N.id_post=(SELECT N.id_post FROM notification 
						WHERE N.id_user=".$_SESSION['id_user']."))
						ORDER BY post_date DESC ";*/
		$sucess=mysql_query($requete) or die(mysql_error());
		While($resultats=mysql_fetch_array($sucess))
		{
			
			echo" <br> <br> 
	
	<table width = 60% class='post_news' cellspading='0' >
	<tr style='height: 12px'width=60%>

		</tr>
		<tr style='background-color: #85c630;'>

		<td>";
			if ($resultats['read_confirm']==1)
			{
			echo"<div class='description'>";
			}
			else 
			echo"<div class='description_notif'>";
		echo  $resultats['pseudo'] . " &nbsp; a commenter votre post:</br>";
		$chaine = $resultats['content'];
		couperChaine($chaine,10);
		$chaineNouvelle=couperChaine($chaine,10);
		echo $chaineNouvelle;
		echo"</div>

		</td>
		</div>
		</td>
			<td style='background-color: white;'>
		<div class='date_notif'>
		".$resultats['post_date']."
		</div>
		
		</td>
		<td>
		<a href='index.php?page=voir_notif&delete_notif=".$resultats['id_comment']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X</a>&nbsp;&nbsp;
		</td>

	</tr>
	<tr>
	<td>
		<a href='index.php?page=view_article&id_post=".$resultats['id_post']."&read_confirm=".$read_confirm."&id_comment=".$resultats['id_comment']."'><div class='comment_button'>voir</div></a>
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
</body>
</html>
