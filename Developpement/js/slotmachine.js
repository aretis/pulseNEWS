var columnReadyCounter = 0;

// This is the callback function for the "hiding" animations
// it gets called for each animation (since we don't know which is slowest)
// the third time it's called, then it resets the column positions
function ifReadyThenReset() {
	
	columnReadyCounter++;
	
	if (columnReadyCounter == 3) {
		$(".col").not(".current .col").css("top", 350);
		columnReadyCounter = 0;
	}

};

// When the DOM is ready
$(function() {
	
	var $allContentBoxes = $(".content-box"),
	    $allTabs = $(".tabs li a"),
	    $el, $colOne, $colTwo, $colThree,
	    hrefSelector = "",
	    speedOne = 1000,
		speedTwo = 2000,
		speedThree = 1500;
	
	// first tab and first content box are default current
	$(".tabs li:first-child a, .content-box:first").addClass("current");
	$(".box-wrapper .current .col").css("top", 0);
	
	$("#slot-machine-tabs").delegate(".tabs a", "click", function() {
		
		$el = $(this);
		
		if ( (!$el.hasClass("current")) && ($(":animated").length == 0 ) ) {
		
			// current tab correctly set
			$allTabs.removeClass("current");
			$el.addClass("current");
			
			// optional... random speeds each time.
			speedOne = Math.floor(Math.random()*1000) + 500;
			speedTwo = Math.floor(Math.random()*1000) + 500;
			speedThree = Math.floor(Math.random()*1000) + 500;
		
			// each column is animated upwards to hide
			// kind of annoyingly redudundant code
			$colOne = $(".box-wrapper .current .col-one");
			$colOne.animate({
				"top": -$colOne.height()
			}, speedOne);
		
			$colTwo = $(".box-wrapper .current .col-two");
			$colTwo.animate({
				"top": -$colTwo.height()
			}, speedTwo);
		
			$colThree = $(".box-wrapper .current .col-three");
			$colThree.animate({
				"top": -$colThree.height()
			}, speedThree);
			
			// new content box is marked as current
			$allContentBoxes.removeClass("current");		
			hrefSelector = $el.attr("href");
			$(hrefSelector).addClass("current");
		
			// columns from new content area are moved up from the bottom
			// also annoying redundant and triple callback seems weird
			$(".box-wrapper .current .col-one").animate({
				"top": 0
			}, speedOne, function() {
				ifReadyThenReset();
			});
	
			$(".box-wrapper .current .col-two").animate({
				"top": 0
			}, speedTwo, function() {
				ifReadyThenReset();
			});
		
			$(".box-wrapper .current .col-three").animate({
				"top": 0
			}, speedThree, function() {
				ifReadyThenReset();
			});
		
		};

	});

});