		<?php
		if( isset($_POST['upload']) )
		{ 
		 $content_dir = 'upload/';
		 if( !is_uploaded_file($tmp_file) )
		{
        exit("Le fichier est introuvable");
		echo ' fichier pas telecharger';
		}
		else
		{		
		echo 'fichier telecharger';
		}
?>