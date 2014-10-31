$(document).ready(function(){	
	ticket = 0;
	price = 0;
	
	$("#reservation-seats .reservation-seats-column-border").mouseover(function(){
		$("#seat-info").show();
	});
	$("#reservation-seats .reservation-seats-column-border").mouseout(function(){
		$("#seat-info").hide();
	});
	$("#reservation-seats .reservation-seats-column-border").click(function(){
		if ($(this).find('.reservation-seats-column-body').hasClass('occupied') == 0){
			var tmp = get_ticket_class(ticket);
			if ($(this).find('.reservation-seats-column-body').hasClass(tmp) == 1){
				$(this).find('.reservation-seats-column-body').removeClass(tmp);
				price -= get_price(ticket);
			}
			else{
				if ($(this).find('.reservation-seats-column-body').hasClass('seat-adult') == 1){
					price -= get_price(0);
				}
				if ($(this).find('.reservation-seats-column-body').hasClass('seat-student') == 1){
					price -= get_price(1);
				}
				if ($(this).find('.reservation-seats-column-body').hasClass('seat-child') == 1){
					price -= get_price(2);
				}
				$(this).find('.reservation-seats-column-body').removeClass('seat-adult');
				$(this).find('.reservation-seats-column-body').removeClass('seat-student');
				$(this).find('.reservation-seats-column-body').removeClass('seat-child');
				$(this).find('.reservation-seats-column-body').addClass(tmp);
				price += get_price(ticket);
			}
			$("#price-value").text(price + "EUR");
			render_payment();
		}
	});
	
	$(".ticket-type").click(function(){
		ticket = $(this).index();
		$(".ticket-type").find(".ticket-type-label").removeClass('selected');
		$(this).find(".ticket-type-label").addClass('selected');
	});
});

function seat_info(row, column){
	col_num = $(".reservation-seats-row:eq(" + (row - 1) + ")").find(".reservation-seats-column-border").size();
	$("#seat-info-row").text(row);
	$("#seat-info-column").text(column);
	if (column <= col_num / 2){
		$("#seat-info").css({left: ((column * 30) + "px")});
		$("#seat-info").css({right: "auto"});
	}
	else{
		$("#seat-info").css({right: (((col_num - column) * 30) + "px")});
		$("#seat-info").css({left: "auto"});
	}
	$("#seat-info").css({top: ((row * 30) + "px")});
}

function get_ticket_class(ticket){
	switch (ticket){
	case 0:
		return 'seat-adult';
	case 1:
		return 'seat-student';
	case 2:
		return 'seat-child';
	}
}

function get_price(ticket){
	switch (ticket){
	case 0:
		return 6;
	case 1:
		return 4;
	case 2:
		return 3;
	}
}

function render_payment(){
	$("#payment-recapitulation").html("");
	$("#reservation-seats .seat-adult").each(function(){render_row(this, 0);});
	$("#reservation-seats .seat-student").each(function(){render_row(this, 1);});
	$("#reservation-seats .seat-child").each(function(){render_row(this, 2);});
	content = "<div class='custom-row'><div class='custom-column payment-category'><div></div></div><div class='custom-column payment-seat'><div></div></div><div class='custom-column payment-price payment-final-price'><div>" + count_price() + "EUR</div></div></div>";
	$("#payment-recapitulation").append(content);
}

function render_row(obj, id){
	category = $(".ticket-type-label:eq(" + id + ")").text();
	parent = $(obj).closest(".reservation-seats-row");
	column = $(parent).find(".reservation-seats-column-body").index(obj) + 1;
	row = $("#reservation-seats").find(".reservation-seats-row").index(parent) + 1;
	seat = "rad: " + row + ", sedadlo: " + column;
	content = "<div class='custom-row underline-dark'><div class='custom-column payment-category'><div>" + category + "</div></div><div class='custom-column payment-seat'><div>" + seat + "</div></div><div class='custom-column payment-price'><div>" + get_price(id) + "EUR</div></div></div>";
	$("#payment-recapitulation").append(content);
}

function count_price(){
	final_price = $("#reservation-seats .seat-adult").size() * get_price(0);
	final_price += $("#reservation-seats .seat-student").size() * get_price(1);
	final_price += $("#reservation-seats .seat-child").size() * get_price(2);
	return final_price;
}