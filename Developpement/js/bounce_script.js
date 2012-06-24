$(document).ready(function(){

	/* Converting the #box div into a bounceBox: */
	$('#box').bounceBox();

	/* Listening for the click event and toggling the box: */

		$('#box').bounceBoxToggle();
	
	/* When the box is clicked, hide it: */
	$('#box').click(function(){
		$('#box').bounceBoxHide();
	});
});
