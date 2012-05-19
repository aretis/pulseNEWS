<?php
	if(isset($_POST['suggest']))
	{
		if(empty($_POST['title']))
		{
			echo'Le champ "Nom du thème" est vide !';
		}
		else if(empty($_POST['content']))
		{
			echo'Le champ "description" est vide !';
		}
		else
		{
			$query="INSERT INTO posts VALUES(' ',".$_SESSION['id_user'].", 2, '".$_POST['title']."', '', '".$_POST['content']."', ' ', ' ', NOW(), ' ')";
			if(!mysql_query($query) )
			{
				echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
				return;
			}
			echo"Votre suggestion à bien été prise en compte !";
		}
	}
?>
<html>

<head>
<link rel="stylesheet" href="design/debate.css" />
</head>

<body>

	<div class="presentation">
		
		Bienvenue sur la page débat du jour !<br><br>
		
		Sur cette page c'est VOUS qui choisissez le thème du débat qui aura 
		lieu chaque jour à partir de 20 h ! Pendant la journée vous 
		pouvez nous suggérer des thèmes pour le débat ou voter pour votre
		thème préféré dans la liste en dessous !
	
	</div>
	
	<br><br>
	<div id="pardessus">
		<div id="menu">
			<span class='lol'>Suggérer un thème !</span>
			<dl>
			<dt></dt>
				<dd>
					<ul>
					
					<br>
					<form action="index.php?page=debate" method="POST" autocomplete="off">
					
						Nom du thème :<br>
						<input type="text" size="100" name="title">
						<br><br>
						Description :<br>
						<textarea name="content" cols="50" rows="7"> </textarea> 
						<br><br>
						<input name="suggest" type="submit" value="Suggérer !">
					</form>
					<ul> </ul>
					</ul>
				</dd>
			</dl>
		</div>
	</div>

	<?php
		include('modeles/call_db.php');
		$query="SELECT pseudo, id_post, title, content, rate, post_date FROM posts INNER JOIN USERS ON posts.id_user = users.id_user WHERE type=2";
		
		$result=call_db($query);
		
		while($data = mysql_fetch_array($result))
		{
			echo"<table cellpadding='0' cellspacing='0' class='post_debate' >";
			echo"<tr style='height: 32px;'>";
				echo"<td rowspan='1'>";
				echo"<div class='title_post'>";
			echo"		&nbsp;".$data['title'];
			echo"	</div>";
			echo"	</td>";

			echo"	<td>";
			echo"		<div class='rate'>";
			if($data['rate'] > 0) echo" + ";
			echo $data['rate']."</div>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr style='background-color: #85c630;'>";
			echo"	<td>";
			echo"		<div class='description'>";
			echo $data['content']; 
			echo"		</div>";
			echo"<span style='color:white'>&nbsp;&nbsp;Suggérer le ";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par ".$data['pseudo'];
			echo"	</span></td>";

			echo"</tr>";
			
			echo"<tr>";
			echo"<td>";
			echo"	<div class='propulse_debate'>&nbsp;";
			echo"	<form action='index.php?page=debate' method='POST'/><input type='hidden' name='type' value='posts' /><input type='hidden' name='PROpulse' value='PROpulse' /><input type='hidden' name='id_news' value='".$data['id_post']."' /><input type='submit' name='PROpulse' value='PROpulse' /></form></div></a>";
			echo"</td>";
			echo"</tr>";
			echo"</table>";
			echo"<br>";
		}
	?>
</body>

</html>