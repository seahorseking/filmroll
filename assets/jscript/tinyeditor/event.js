$(document).ready(function(){
	//image extension
	image_ext = new TinyImage('ext-image-form', 'ext-image');
	
	$("iframe").contents().on('click', 'img', function(){
		image_ext.setActive(this);
	});
	
	$("#ext-image-form :button").click(function(){
		image_ext.save();
	});
	
	$(".pop-up-bg").click(function(){
		image_ext.setActive(null);
	});
});