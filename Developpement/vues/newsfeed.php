<?php

	if(isset($_GET['disconnect'])) unset($_SESSION['pseudo']);
	if(isset($_GET['delete_post'])) include('modeles/delete_post.php');
	
	if(isset($_POST['pulse']))
	{
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
	}
?>

	<div id="page-wrap">

	     <div id="example-two">
					
    		<ul class="nav">
				
                <li class="nav-one"><a href="#featured2" class="current" >Politique</a></li>
                <li class="nav-two"><a href="#core2">Economie</a></li>
                <li class="nav-three"><a href="#jquerytuts2">Sport</a></li>
                <li class="nav-four"><a href="#classics2">Ecologie</a></li>
				<li class="nav-five"><a href="#jquerytuts3">People</a></li>
				<li class="nav-six last"><a href="#jquerytuts4">Insolite</a></li>
            </ul>
    		
    		<div class="list-wrap">
    		
			
			
			
    			<ul id="featured2">
    			<?php
					$url= 'politique.xml';
					$cat = 1;
					
					echo RSS_display($cat, $url, 20);		
					?>
    			</ul>
        		 
        		 <ul id="core2" class="hide">
                    <?php
					$url= 'economie.xml';
					$cat = 2;
					
					echo RSS_display($cat, $url, 20);		
					?>
        		 </ul>
        		 
        		 <ul id="jquerytuts2" class="hide">
        		   <?php
					$url= 'sport.xml';
					$cat = 5;
					
					echo RSS_display($cat, $url, 20);		
					?>
        		 </ul>
        		 
        		 <ul id="classics2" class="hide">
                    <?php
					$url= 'ecologie.xml';
					$cat = 3;
					
					echo RSS_display($cat, $url, 20);		
					?>
        		 </ul>
				 
				 <ul id="jquerytuts3" class="hide">
                    <?php
					$url= 'people.xml';
					$cat = 8;
					
					echo RSS_display($cat, $url, 20);		
					?>
        		 </ul>
				 
				  <ul id="jquerytuts4" class="hide">
                    <?php
					$url= 'insolite.xml';
					$cat = 7;
					
					echo RSS_display($cat, $url, 20);		
					?>
        		 </ul>
        		 
    		 </div> <!-- END List Wrap -->
		 
		 </div> <!-- END Organic Tabs (Example One) -->
		
	</div>