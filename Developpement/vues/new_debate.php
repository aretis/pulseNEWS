<?php

	include('modeles/call_db.php');
	if(isset($_POST['comment']))
		{
			include('modeles/save_comment.php');
			save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['comment']);
		}
		else if(isset($_POST['comment_a_comment']))
		{	
			include('modeles/save_comment_comment.php');
			save_comment($_POST['id_news'], $_SESSION['id_user'], $_POST['id_parent'], $_POST['comment_a_comment']);
		}	
		if(isset($_GET['delete_comment'])) {
		include('modeles/delete_comment.php');}

		else if(isset($_GET['delete_comment_of_comment'])) {
		include('modeles/delete_comment_of_comment.php');}
		
	
	$query = "SELECT * FROM posts NATURAL JOIN users WHERE type = 2 HAVING MAX(rate)";
	$result = call_db($query);
	
	while($data = mysql_fetch_array($result))
	{
		$id = $data['id_post'];
		echo"<div class='troll'><div id='new_debate'><table cellpadding='0' cellspacing='0' class='article'>";
			echo"<tr style='height: 10px;'>";
			echo"	<td rowspan='1'>";
			echo"	<div class='title_post'>";
			
			echo"		&nbsp;".$data['title'];
	
			echo"	</div>";
			echo"	</td>";
			echo"";
			echo"	<td>";
			echo"	</td>";
			echo"</tr>";
			echo"<tr>";
			echo"	<td>";
			echo"		<div class='article_content'>";
			echo"<p>";
			echo $data['content'];
			echo"</p>";
			
			$id = $data['id_post'];
			
			echo"		</div>";
			echo"<span class='info_post'>&nbsp;&nbsp;Ecrit le&nbsp;";
			echo date("d/m/Y à H\hi", strtotime($data['post_date']));
			echo"&nbsp;par <a style='color: black;' href='index.php?page=profile&pseudo=".$data['pseudo']."'>".$data['pseudo']." </a>!</span>";
			
			echo"	</td>";			
			echo"	</td>";
			echo"</tr>";
			echo"<tr><td>";
			if(isset($_SESSION['pseudo'])) include('modeles/comment.php');
			if(isset($_SESSION['pseudo']) && isset($_GET['pseudo']))
			{
			
				echo"	<div class='propulse'>&nbsp;";
				
				echo"<a href=\"index.php?page=profile&pseudo=".$_SESSION['pseudo']."&id_news=".$id."&PROpulse=PROpulse\" >
					<img id=\"myDiv\" src='design/img/up.png' 
					onmouseover=\"this.src='design/img/up_plein.png';\" 
					onmouseout=\"this.src='design/img/up.png';\"/>
				</a></div>";
			}
			

			echo"</td>";
			echo"</tr>";
			echo"<tr style='height: 30px;'>";
			echo"</tr>";
			echo"</table></div></div>";
	}
	?>