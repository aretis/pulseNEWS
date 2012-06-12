<?php

$connexion = mysql_connect ('localhost', 'root' , '') or die (mysql_error ());
$sucess = mysql_select_db ('pulsenews') or die (mysql_error ());
?>