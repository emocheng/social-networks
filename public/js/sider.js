$(function(){

	$(".dropdown-toggle").click(function() {
		var a = $(this).next();
		if(!$(a).is(":animated")) {
			$(a).slideToggle("slow");	
		}	
    });
	
	

})