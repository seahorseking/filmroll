$(document).ready(function(){
	$("#search-box").focus(function(){
		$("#search-icon").hide();
	});
	
	$("#search-box").blur(function(){
		if ($("#search-box").val() == ""){
			$("#search-icon").show();
		}
	});
});