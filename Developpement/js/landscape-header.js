// JavaScript Document
$(document).ready(function(){
	
	$buildingup = false;
	
	$("#sliders>*").show();
			
	
	//Blurs all links when clicked
	$("a").click(function(){
		$(this).blur();
	});
	
	$(this).delay(2000,function(){
		$("#titlebar").fadeOut(1000);
	});
	
	$(this).delay(3500,function(){
		
		//Show the elements	
		$(".village").stop().animate({top:'30px'}, {queue:false, duration:2000, easing: 'easeInOutBack'});
		$(".cloudbar").stop().animate({top:'0px'}, {queue:false, duration:2000, easing: 'easeInOutBack'});
		$buildingup = true;	
		
    });
	
	$("a.toggle").click(function(){
		
		if ($buildingup == false){
			
			$("#titlebar").fadeOut(1000);
			$(this).delay(1000,function(){
				$(".village").stop().animate({top:'30px'}, {queue:false, duration:2000, easing: 'easeInOutBack'});
				$(".cloudbar").stop().animate({top:'0px'}, {queue:false, duration:2000, easing: 'easeInOutBack'});
				$buildingup = true;
			});
		
		}else{
			
			$(".village").stop().animate({top:'366px'}, {queue:false, duration:2000, easing: 'easeInOutBack'});
			$(".cloudbar").stop().animate({top:'-465px'}, {queue:false, duration:2000, easing: 'easeInOutBack'});
			$buildingup = false;
			
			$(this).delay(2000,function(){
				$("#titlebar").fadeIn(1000);
			});
			
		}
		
	});
	
	//Change background color of body
	$("a.change").click(function(){
		$('body').css('background-color','#FFF');				 
	});
	 
});