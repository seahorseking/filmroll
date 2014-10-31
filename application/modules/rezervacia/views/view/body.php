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
						<div class="reservation-seats-column-border"><div class="<?php echo $class?>"></div></div>
						<?php
					}
					?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="card card-move-right">
		<div class="title1">Platba</div>
	</div>
</div>