var BASE_URL = "http://localhost/git/filmroll/";

function CardConnection(bar, obj){
	this.scroll = bar;
	this.main = obj;
}

function Cards(){
	
	this.date = new Date();
	this.delay = 250;
	this.scrollTime = 500;
	this.active = 0;
	this.cardMainClass = "card-main";
	this.cardClass = "card";
	this.max = 0;
	this.min = 0;
	this.activeObj;
	this.timer = false;
	this.connection = [];
	
	this.insertPictogram = function(){
		$(".card-main").prepend('<div class="pictogram"><img src="' + BASE_URL + 'assets/images/pictogram2.png"></div>');
	};
	
	this.insertController = function(){
		
	};
	
	this.construct = function(scroll_bar, obj){
		this.connection.push(new CardConnection(scroll_bar, obj));
		tmp = this;
		$(scroll_bar).bind('mouseover', function(){tmp.setMax(obj);});
		//this.insertPictogram();
		this.insertController();
	};
	
	this.setMax = function(obj){
		if (obj != this.activeObj){
			this.timer = 0;
			var find = $(obj).children(".card-active");
			this.active = $(obj).children("." + this.cardClass).index(find);
		}
		this.max = $(obj).children("." + this.cardClass).size();
		this.activeObj = obj;
	};
	
	this.setUse = function(){
		this.timer = this.date.getTime();
	};
	
	this.removeFormating = function(active, obj, reset){
		$(obj).children(".card-active").removeClass('card-move-left');
		$(obj).children(".card-active").removeClass('card-move-right');
		if (reset == true){
			this.timer = 0;
		}
	};
	
	this.sweepScrollConstruct = function(elem){
		switch ($(elem).attr('id')){
		case 'menu':
			break;
		case 'scrollbar':
		case 'program-scroll':
		case 'reservation-steps':
			$(elem).find(".scrollbar-item").removeClass('selected');
			$(elem).find(".scrollbar-item:eq(" + this.active + ")").addClass('selected');
			break;
		default:
			var classes = $(elem).attr('class');
			if (classes.indexOf('sweep-scroll-box') > -1){
				$(elem).find(".scrollbox-body").text((this.active + 1) + "/" + this.max);
			}
			break;	
		}
	};
	
	this.onSweepFinnish = function(obj, hide){
		if (hide){
			$(obj).children(".sweep-scroll").addClass("sweep-scroll-invisible");
		}
		$(obj).children(".pictogram").children('img').attr('src', BASE_URL + "assets/images/pictogram2.png");
	};
	
	this.setActive = function(active, hide){
		if (this.max - this.min > 1){
			this.date = new Date();
			if (this.date.getTime() - this.delay >= this.timer){
				this.setUse();
				$(this.activeObj).children("." + this.cardClass).removeClass('card-active');
				$(this.activeObj).children("." + this.cardClass).removeClass('card-move-left');
				$(this.activeObj).children("." + this.cardClass).removeClass('card-move-right');
				if (active < this.min){
					this.active = this.min;
				}
				else if (active >= this.max){
					this.active = this.max - 1;
				}
				else{
					this.active = active;
				}
				this.removeFormating(this.active, this.activeObj, false);
				$(this.activeObj).children("." + this.cardClass + ":lt(" + this.active + ")").addClass('card-move-left');
				$(this.activeObj).children("." + this.cardClass + ":gt(" + this.active + ")").addClass('card-move-right');
				$(this.activeObj).children("." + this.cardClass + ":eq(" + this.active + ")").addClass('card-active');
				$(this.activeObj).children(".sweep-scroll").removeClass("sweep-scroll-invisible");
				var tmpThis = this;
				if ($(this.activeObj).children(".sweep-scroll").size() > 0){
					$(this.activeObj).children(".sweep-scroll").each(function(index, elem){tmpThis.sweepScrollConstruct(this);});
					setTimeout(this.onSweepFinnish, this.scrollTime, this.activeObj, hide);				}
				else if ($(this.activeObj).closest("#menu").size() == 0 && this.connectionExists(this.activeObj)){
					$(this.connectionGetScroll(this.activeObj)).each(function(index, elem){tmpThis.sweepScrollConstruct(this);});
				}
				$(this.activeObj).children(".pictogram").find('img').attr('src', BASE_URL + "assets/images/logo_animation.gif");
			}
		}
	};
	
	this.connectionExists = function(obj){
		var i;
		for (i = 0; i < this.connection.length; i++){
			if ($(obj).is(this.connection[i].main)){
				return true;
			}
		}
		return false;
	};
	
	this.connectionGetScroll = function(obj){
		var i;
		for (i = 0; i < this.connection.length; i++){
			if ($(obj).is(this.connection[i].main)){
				return this.connection[i].scroll;
			}
		}
		return null;
	};
	
	this.increment = function(){
		this.setActive(this.active + 1, true);
		$(document).scrollLeft(0);
		//$("#test").text(this.active + "-" + this.max + "*" + $(this.activeObj).attr('id'));
	};
	this.decrement = function(){
		this.setActive(this.active - 1, true);
		$(document).scrollLeft(0);
		//$("#test").text(this.active + "-" + this.max + "*" + $(this.activeObj).attr('id'));
	};
}

cards = new Cards();

$(document).ready(function(){
	if ($("#program-scroll").size() > 0){
		cards.construct($("#program-scroll"), $("#program .card-main").get(0));
	}
	if ($("#reservation-steps").size() > 0){
		cards.construct($("#reservation-steps"), $("#content .card-main").get(0));
	}
	
	$(".sweep-scroll").bind("mouseover", function(event){
		$(this).removeClass("sweep-scroll-invisible");
	});
	$(".sweep-scroll").bind("mouseout", function(event){
		$(this).addClass("sweep-scroll-invisible");
	});
	
	$("*").bind("mouseover", function(event){
		if (event.target == this){
			var c = $(this).closest('.card-main');
			if (c.size() > 0){
				cards.setMax(c);
				//$("#test").text(cards.active + "-" + cards.max + "*" + $(cards.activeObj).attr('id'));
			}
		}
		//event.stopPropagation();
	});
	
	$(".scrollbar-item").bind("click", function(){
		cards.setActive($(this).index(), false);
	});
	
	$(document).on("wheel", function(event){
		if (event.originalEvent.deltaX > 0){
			cards.decrement();
		}
		else if (event.originalEvent.deltaX < 0){
			cards.increment();
		}
	});
	
	$(window).on("swipeleft", function(){
		cards.increment();
	});
	$(window).on("swiperight", function(){
		cards.decrement();
	});
});