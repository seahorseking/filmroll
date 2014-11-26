$(window).load(function(){
	$(".invis-scroll").each(function(){
		validate_scroll(this);
	});
});

$(document).ready(function(){
	
	$(".invis-scroll").mouseover(function(){
		block_scroll = true;
	});
	$(".invis-scroll").mouseout(function(){
		block_scroll = false;
	});
	
	$(".invis-scroll").on("wheel", function(event){
		parent = $(this).closest(".invis-scroll-view");
		this_h = $(this).height();
		parent_h = parent.height();
		if (parent_h < this_h){
			$(parent).find(".invis-scroll-arrow-up").show();
			$(parent).find(".invis-scroll-arrow-down").show();
			t = $(this).position().top - event.originalEvent.deltaY;
			if ((t + this_h) <  parent_h){
				t = parent_h - this_h;
				$(parent).find(".invis-scroll-arrow-down").hide();
			}
			else if (t > 0){
				t = 0;
				$(parent).find(".invis-scroll-arrow-up").hide();
			}
			$(this).css({top: (t + "px")});
		}
		else{
			$(parent).find(".invis-scroll-arrow-up").hide();
			$(parent).find(".invis-scroll-arrow-down").hide();
		}
	});
	$(window).resize(function(){
		$(".invis-scroll").each(function(){validate_scroll(this);});
	});
	
	$(document).on("wheel", function(event){
		if (typeof block_scroll !== 'undefined' && block_scroll){
			return false;
		}
	});
});

function validate_scroll(obj){
	parent = $(obj).closest(".invis-scroll-view");
	this_h = $(obj).height();
	parent_h = parent.height();
	if (parent_h < this_h){
		t = $(obj).position().top;
		$(parent).find(".invis-scroll-arrow-up").show();
		$(parent).find(".invis-scroll-arrow-down").show();
		if ((t + this_h) <  parent_h){
			t = parent_h - this_h;
			$(parent).find(".invis-scroll-arrow-down").hide();
		}
		else if (t > 0){
			t = 0;
			$(parent).find(".invis-scroll-arrow-up").hide();
		}
		$(obj).css({top: (t + "px")});
	}
	else{
		$(obj).css({top: "0px"});
		$(parent).find(".invis-scroll-arrow-up").hide();
		$(parent).find(".invis-scroll-arrow-down").hide();
	}
}