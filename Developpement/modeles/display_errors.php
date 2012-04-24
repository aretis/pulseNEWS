<?php
/* Salman ALAMDAR
	Function : Display errors on screen, and save errors in a log file
	CALL IT ON THE TOP OF YOUR SCRIPT PHP
	12/04/2012
*/

function display_errors()
{
	ini_set('display_errors', 1); 
	ini_set('log_errors', 1); 
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); 
	error_reporting(E_ALL);
}
?>