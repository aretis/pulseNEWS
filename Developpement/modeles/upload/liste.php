<html>
<head><title>Stock d'images</title></head>
<body>
<?php
	include ("connexion.php");
	$request = 'SELECT * FROM pictures ORDER BY picture_name';
	$sucess = mysql_query ($request) or die (mysql_error ());
	while ( $col = mysql_fetch_assoc($sucess) )
	{
		echo "<a href=\"apercu.php?id=".$col['picture_id'].
		"\">".$col['picture_name']."</a><br />";
	}
?>
</body>
</html>