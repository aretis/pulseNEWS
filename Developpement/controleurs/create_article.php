<?php
include ("modeles/transfert.php");
include_once('modeles/call_db.php');
include_once('modeles/create_article.php');

$field_errors = 0;
$no_image = 0;

if( isset($_FILES['fichier']['tmp_name']) && empty($_FILES['fichier']['tmp_name']))
{
	$no_image = 1;
}
else
{
	if( isset($_POST['area']) || isset($_POST['cat']) )
	{

		
		if( !empty($_POST['title']) && isset($_FILES['fichier']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['area']) && !empty($_POST['cat']))
		{
			
		
			$article = array();

			$article['title'] = $_POST['title'];
			$article['description'] = $_POST['description'];
			$article['content'] = $_POST['content'];
			$article['area'] = $_POST['area'];
			$article['cat'] = $_POST['cat'];
			
			create_article($article);
			?>
				<script language="Javascript">
				document.location.replace("index.php?page=profile");
				</script>
			<?php
		}
		else
		{
			$field_errors = 1;
			$article['title'] = $_POST['title'];
			$article['description'] = $_POST['description'];
			$article['content'] = $_POST['content'];
			$article['area'] = $_POST['area'];
			$article['cat'] = $_POST['cat'];
		}
		
		
	}
}


include('vues/header.php');
 

include('vues/create_article.php');
?>