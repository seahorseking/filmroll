<?php 
$seats_from = 13;
$seats_to = 21;
?>
<div class="card-main">
	<div class="card card-move-left">
		<div class="title1">Výber Filmu</div>
	</div>
	<div class="card card-active">
		<div class="title1">Výber Miesta</div>
		<div id="reservation-screen"></div>
		<div id="reservation-seats" class="out-center-x">
			<div class="in-center-x">
				<?php 
				for ($i = $seats_from; $i < $seats_to; $i+=1){
					$left = ($seats_to - $i) * 30 / 2; 
					?>
					<div class="reservation-seats-row" style="<?php echo "padding-left: ".$left."px;";?>">
					<?php
					for ($j = 0; $j < $i; $j++){
						$class = "reservation-seats-column-body";
						if (isset($seats[$i - $seats_from][$j]) && $seats[$i - $seats_from][$j] == 1){
							$class .= " occupied";
						}
						?>
						<div class="reservation-seats-column-border" onMouseOver="seat_info(<?php echo ($i - $seats_from + 1);?>, <?php echo ($j + 1);?>);"><div class="<?php echo $class?>"></div></div>
						<?php
					}
					?>
					</div>
					<?php
				}
				?>
				<div id="seat-info" class="info-label" style="display: none;">
					<div class="info-part">rad: <span id="seat-info-row"></span></div>
					<div class="info-part">sedadlo: <span id="seat-info-column"></span></div>
				</div>
			</div>
		</div>
		<div id="reservation-legend">
			<div id="tickets">
				<div class="ticket-type">
					<div class="reservation-seats-column-border"><div class="reservation-seats-column-body seat-adult"></div></div>
					<div class="ticket-type-label scrollbar-item selected"><a class="exception line" href="javascript:void(0)">Dospelý</a></div>
				</div>
				<div class="ticket-type">
					<div class="reservation-seats-column-border"><div class="reservation-seats-column-body seat-student"></div></div>
					<div class="ticket-type-label scrollbar-item"><a class="exception line" href="javascript:void(0)">Študentský</a></div>
				</div>
				<div class="ticket-type">
					<div class="reservation-seats-column-border"><div class="reservation-seats-column-body seat-child"></div></div>
					<div class="ticket-type-label scrollbar-item"><a class="exception line" href="javascript:void(0)">Detský</a></div>
				</div>
			</div>
			<div id="price" class="title3">
				<div>Price: <span id="price-value">0EUR</span></div>
			</div>
		</div>
		<div id="reservation-button">
			<div class="custom-button custom-button-right">
				<a href="javascript:void(0)" onClick="cards.increment();"><div>Ďalej</div></a>
			</div>
			<div class="custom-button custom-button-left">
				<a href="javascript:void(0)" onClick="cards.decrement();"><div>Späť</div></a>
			</div>
		</div>
	</div>
	<div class="card card-move-right">
		<div class="title1">Platba</div>
		<div id="payment-recapitulation" class="custom-table"></div>
		<div class="custom-button custom-button-left">
			<a href="javascript:void(0)" onClick="cards.decrement();"><div>Späť</div></a>
		</div>
	</div>
</div>