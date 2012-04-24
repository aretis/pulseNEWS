//-----------------------------
//Christie Bunlon 
//19/04/2012
// fonction test de l'upload d'images
//-----------------------------

<?php
 $id_user =' 3';
 
 

 
if( isset($_POST['upload']) ) 
{
    $content_dir = 'upload/';

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }


    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }

 
    
	$_FILES ['fichier']['name'] = $id_user.'.jpg';
	
	$name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
	
	
	
}

	echo $_FILES['fichier']['name'];

	$_FILES ['fichier']['name'] = $id_user.'.jpg';

	echo $_FILES ['fichier']['name'];



?>

