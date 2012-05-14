<?php if(isset($_POST['pulse']))
{
	include('modeles/call_db.php');
	
	// Checking if entry is not a duplicate
	
	mysql_query("SET NAMES 'utf8'");
	
	$query = 'SELECT title FROM posts WHERE id_user='.$_SESSION['id_user'];
	$result = call_db($query);
		
	$news_exists = 0;
	
	while($data = mysql_fetch_array($result))
	{
		if	(($data['title']) == ($_POST['title']))
		{	
			$news_exists = 1;	
		}

	}
	
	if($news_exists == 0)
	{
		$query='INSERT INTO posts VALUES ("", "'.$_SESSION['id_user'].'", "1", "'.$_POST['title'].'", "'.$_POST['link'].'", "", "'.$_POST['cat'].'", "0", NOW(), "0")';
		
		if(!mysql_query($query) )
		{
			echo "La requête n'a pas abouti<br />".htmlentities($query).'<br />'.mysql_error();
			return;
		}
	}
}?>


<div class='news_sort'>
TOUS&nbsp;&nbsp;ma région&nbsp;&nbsp;membres&nbsp;&nbsp;politique&nbsp;&nbsp;économie&nbsp;&nbsp;sport&nbsp;&nbsp;culture&nbsp;&nbsp;faits divers
</div>
<br>
<br>
<table>
<td>
<table cellpadding='0' cellspacing='0' class='rss_block'>

<?php 
if(isset($_POST['pulse']))
{
	if($news_exists == 1){
		echo "<span style='color : red'> Vous avez déja pulsé cette news !</span>";}
		
	else if($news_exists == 0){
		echo"<span style='color : red'>Votre news à bien été pulsé !</span>";}
}?>
			<tr>
				<td>
					<div class='block_title'>&nbsp;politique</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php
					$url= 'news.xml';
					$cat = 'politique';
					
					echo RSS_display($cat, $url, 3);		
					?>
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
			<tr>
				<td>
					<div class='block_title'>&nbsp;économie</div>
				</td>
			</tr>
			<tr>
				<td style='background-color: #85c630;'>
					<div class='block_content'>
					<?php
					$url= 'news.xml';
					$cat = 'économie';
					
					echo RSS_display($cat, $url, 3);		
					?>
					
					</div>
				</td>
			</tr>
</table>

</td>
<td>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

</tr>
<tr>
<td>
	<a href=''><div class='comment_button'>débattre</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>DEpulse!</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>PROpulse!</div></a>
</td>
</tr>
</table>
<br>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

</tr>
<tr>
<td>
	<a href=''><div class='comment_button'>débattre</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>DEpulse!</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>PROpulse!</div></a>
</td>
</tr>
</table>
<br>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

</tr>
<tr>
<td>
	<a href=''><div class='comment_button'>débattre</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>DEpulse!</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>PROpulse!</div></a>
</td>
</tr>
</table>
<br>
<table cellpadding='0' cellspacing='0' class='post_news' >
<tr style='height: 32px;'>
	<td rowspan='1'>
	<div class='title_post'>
		&nbsp;Nom du journal: Titre de l'article
	</div>
	</td>

	<td>
		<div class='rate'>+128</div>
	</td>
</tr>
<tr style='background-color: #85c630;'>
	<td>
		<div class='description'>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque eget eros viverra tincidunt nec nec lacus. Mauris ullamcorper consequat dolor at sagittis. Nulla sed nunc semper lectus malesuada tristique et et sem. Vivamus at nisl velit, ut volutpat est. Nam a justo nibh. In consequat nunc id ante blandit in pellentesque turpis interdum. 
		</div>
	</td>



	<td style='background-color: white;'>
		<div class='date_news'>
		Aujourd'hui à 9h15
		</div>
		
	</td>

</tr>
<tr>
<td>
	<a href=''><div class='comment_button'>débattre</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>DEpulse!</div></a>
	<div style='float: right; width: 5%px;'>&nbsp;</div>
	<a href=''><div class='rate_button'>PROpulse!</div></a>
</td>
</tr>
</table>
</td>
<td>
	<table cellpadding='0' cellspacing='0' class='rss_block'>

			<tr>
				<td>
				</td>
				<td>
					<div class='block_title'>&nbsp;sport</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td style='background-color: #85c630;'>
					<div class='block_content_right'>
					<?php
					$url= 'news.xml';
					$cat = 'sport';
					
					echo RSS_display($cat, $url, 3);		
					?>				
					</div>
				</td>
			</tr>
			<tr style='height: 25px;'>
			</tr>
			<tr>
			<td>
			</td>
				<td>
					<div class='block_title'>&nbsp;écologie</div>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td style='background-color: #85c630;'>
					<div class='block_content_right'>	
					
					<?php
					$url= 'news.xml';
					$cat = 'écologie';
					
					echo RSS_display($cat, $url, 3);		
					?>					
					</div>
				</td>
			</tr>
</table>
</td>
</table>