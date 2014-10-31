//image extension
TinyImage = function(form, pop_up){
	this.active;
	this.form = $('#' + form);
	this.pop_up = $('#' + pop_up);
	
	this.fillForm = function(){
		var img = this.active;
		$(this.form).find(":input").each(function(){
			if ($(this).attr("type") != "button"){
				var name_split = $(this).attr("name").split("_");
				var name = name_split[0];
				var value = $(img).css(name);
				if (name_split.length > 1){
					value = value.replace(name_split[1], "");
				}
				$(this).val(value);
			}
		});
	};
	
	this.setActive = function(obj){
		if (obj == null){
			$(this.pop_up).hide();
			$(".pop-up-bg").hide();
		}
		else{
			$(this.pop_up).show();
			$(".pop-up-bg").show();
			this.center();
			this.active = obj;
			this.fillForm();
		}
	};
	
	this.save = function(){
		var img = this.active;
		$(this.form).find(":input").each(function(){
			if ($(this).attr("type") != "button"){
				var name_split = $(this).attr("name").split("_");
				var name = name_split[0];
				var extra = "";
				if (name_split.length > 1){
					extra = name_split[1];
				}
				var value = $(this).val();
				$(img).css(name, value + extra);
			}
		});
		this.setActive(null);
	};
	
	this.center = function(){
		$(this.pop_up).css({width: 'auto', height: 'auto'});
		width = $(this.pop_up).width();
		height = $(this.pop_up).height();
		padding = $(this.pop_up).css('padding-top');
		if (height + 2 * padding > $(window).height()){
			shrink = ($(window).height() - 2 * padding) / height; 
			height *= shrink;
			width *= shrink;
		}
		if (width + 2 * padding > $(window).width()){
			shrink = ($(window).width() - 2 * padding) / width; 
			height *= shrink;
			width *= shrink;
		}
		$(this.pop_up).css({width: width, height: height});
		$(this.pop_up).css({left: (($(window).width() - width) / 2), top: (($(window).height() - height) / 2)});
	};
};