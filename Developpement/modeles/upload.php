//-------------------------------------------
//Christie Bunlon
//19/04/2012
//permet de uploader une photo pour l photo de profil
//-------------------------------------------


<?php

 
if( isset($_POST['upload']) ) 
{
    $content_dir = 'upload/';

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }


    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') )
    {
        exit("Le fichier n'est pas une image ou alors le type de l'image n'est pas supporté");
    }

 
    
	$_FILES ['fichier']['name'] = $id_user.'.jpg';
	
	$name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
	
	
	
}

?>

