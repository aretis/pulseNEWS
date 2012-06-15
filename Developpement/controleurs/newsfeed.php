
<script src="js/jquery-1.7.2.js"></script>
<script src="js/ui/jquery.ui.core.js"></script>
<script src="js/ui/jquery.ui.widget.js"></script>
<script src="js/ui/jquery.ui.mouse.js"></script>
<script src="js/ui/jquery.ui.sortable.js"></script>
<script src="js/ui/jquery.ui.accordion.js"></script>

<script>
	$(function() {
		$( "#accordion" )
			.accordion({
				header: "> div > h3"
			})
			.sortable({
				axis: "y",
				handle: "h3",
				stop: function( event, ui ) {
					// IE doesn't register the blur when sorting
					// so trigger focusout handlers to remove .ui-state-focus
					ui.item.children( "h3" ).triggerHandler( "focusout" );
				}
			});
	});
	</script>

<?php

require_once('modeles/call_db.php');
require_once("modeles/rsslib.php");


include('vues/header.php');
 

include('vues/newsfeed.php');
?>