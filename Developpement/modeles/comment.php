<?php
	
	/* Comments article
		14/05/2012
		Salman Alamdar
	*/
	
	if(isset($_GET['pseudo'])) echo"<form action='index.php?page=profile&pseudo=".$_GET['pseudo']."' method='post'/>";
	else echo"<form action='index.php?page=profile' method='post'/>";
	echo"<br>";
	echo"&nbsp;&nbsp;<input type='text' name='comment' placeholder='Commenter...' size='77%'>";
	echo"<input type='hidden' name='id_news' value='".$id."' />";
	echo"<input style='display:none' type='submit' />";
	echo'</form>';
	$query = "SELECT id_comment, content, post_date, pseudo FROM comments INNER JOIN USERS ON comments.id_user = users.id_user WHERE id_post = ".$id;
	$result = call_db($query);


	?>
	
		<div id="wrapper">
		<div class="accordionButton">Commentaires</div>
		<div class="accordionContent">
		
	<?php
	while($data = mysql_fetch_array($result))
	{
		
		echo"<div class='comment_post'>";
		echo"<span style='font-size:22px;  font-weight:bold;'>";
			if(isset($_SESSION['pseudo']))
		{
			if($data['pseudo'] == $_SESSION['pseudo'])
			{
				if(isset($_GET['pseudo'])) echo"<a href='index.php?page=profile&pseudo=".$_GET['pseudo']."&delete_comment=".$data['id_comment']."'>X</a>";
				else echo"<a href='index.php?page=profile&delete_comment=".$data['id_comment']."'>X</a>";
			}
		}
		echo "&nbsp;&nbsp;<a style='color: black;' href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>"; 
		echo": &nbsp;&nbsp;";
		echo"</span>";
		
		echo"<span style='font-size:15px;'>";
		echo "&nbsp;&nbsp;".$data['content'];
		echo"</span>";
		
		echo"<span style='font-size:10px;'>";
		echo"<br>&nbsp;&nbsp;Ecrit le ";
		echo date("d/m/Y à H\hi", strtotime($data['post_date']));
		echo"</div>";

		echo"</span>";
	}
	

	?>
	
	
	
		</div>

	</div>
	