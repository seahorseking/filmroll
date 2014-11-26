$(document).ready(function(){
	$("#search-box").focus(function(){
		$("#search-icon").hide();
	});
	
	$("#search-box").blur(function(){
		if ($("#search-box").val() == ""){
			$("#search-icon").show();
		}
	});
	
	$("#header-cinema").click(function(){
		$("#menu").toggle();
	});
	
	$("#body").click(function(event){
		event.stopPropagation();
	});
	$("html").click(function(event){
		$("#menu").hide();
	});
	
	$(".cinema-name").click(function(event){
		$("#menu .selected").removeClass("selected");
		var parent = $(this).closest(".cinema-place");
		$(parent).addClass("selected");;
		cards.setMax($("#menu .card-main"));
		cards.setActive($(parent).index() - 1);
		$("#header-cinema").text($(this).find("a").text());
	});
});