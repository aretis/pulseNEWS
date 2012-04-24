

	

<?php	
	
	if(isset($_POST['upload']))
	{
	$fichier ="upload\\3.jpg";
	unlink( $fichier );
	include('upload.php');
	}
	
	$query = 'SELECT * FROM users';
	include('call_db.php');
	$result = call_db($query);
	
	
		
	
?>