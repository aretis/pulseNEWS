//Function which puts informations about users in the DB
//Brice HOFFMANN,edit Salman ALAMDAR

<?php

function valid_register($pseudo,$password,$surname,$firstname,$mail,$areaname)
{
	include('modeles/connect_db.php');

	mysql_query('INSERT INTO users VALUES("","'.$pseudo.'","'.$password.'","'.$surname.'","'.$firstname.'","'.$mail.'","", "", "'.$areaname.'","","")');

	mysql_close($link);
}
?>