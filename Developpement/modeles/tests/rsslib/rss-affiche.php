<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" dir="ltr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	require_once("rsslib.php");
?>

</head>

	<?php

	

		$url= 'http://news.google.fr/news?pz=1&cf=all&ned=fr&hl=fr&output=rss';

		echo RSS_display($url, 5);
	?>

</div>


</body>
</html>
