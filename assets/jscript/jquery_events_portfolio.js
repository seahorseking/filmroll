$(document).ready(function(){
	$(".portfolio-preview").mouseover(function(e){
		$(this).find("div.show").show();
	});
	$(".portfolio-preview").mouseout(function(e){
		$(".portfolio-preview").find("div.show").hide();
	});
});