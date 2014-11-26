<?php 
function get_left($from, $to, $val){
	return ($val - $from) / ($to - $from) * 80;
}
$timeline_from = 18;
$timeline_to = 21;
$movies = array(
		array(
				'title' => "The Interview",
				'slug' => "the-interview",
				'length' => "1:30",
		),
		array(
				'title' => "Interstellar",
				'slug' => "interstellar",
				'length' => "2:10",
		),
		array(
				'title' => "The Fighter",
				'slug' => "the-fighter",
				'length' => "1:50",
		),
);
$days = array(
		'pondelok' => array(
				'day' => '10',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
						2 => array(
								'type' => "SK dab",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
										array(
												'time' => "21:00",
												'time_s' => "2100",
										),
								),
						),
				),
		),
		'utorok' => array(
				'day' => '11',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
				),
		),
		'streda' => array(
				'day' => '12',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
				),
		),
		'štvrtok' => array(
				'day' => '13',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
				),
		),
		'piatok' => array(
				'day' => '14',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "19:00",
												'time_s' => "1900",
										),
										array(
												'time' => "21:00",
												'time_s' => "2100",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
				),
		),
		'sobota' => array(
				'day' => '15',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "19:00",
												'time_s' => "1900",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "19:00",
												'time_s' => "1900",
										),
										array(
												'time' => "21:00",
												'time_s' => "2100",
										),
								),
						),
						2 => array(
								'type' => "SK dab",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
				),
		),
		'nedela' => array(
				'day' => '16',
				'month' => '12',
				'year' => '2014',
				'm' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
										array(
												'time' => "18:00",
												'time_s' => "1800",
										),
								),
						),
						1 => array(
								'type' => "SK tit",
								'time' => array(
										array(
												'time' => "20:00",
												'time_s' => "2000",
										),
								),
						),
						2 => array(
								'type' => "SK dab",
								'time' => array(
										array(
												'time' => "21:00",
												'time_s' => "2100",
										),
								),
						),
				),
		),
);

$seats_from = 13;
$seats_to = 21;
?>
<div class="card-main">
	<div class="card card-move-left">
		<div class="title1">Výber Filmu</div>
		
		<!-- 
		<div id="program-scroll">
			<table class="center">
				<tr class="title3">
					<td class="scrollbar-item selected"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(0);">Po</a></td>
					<td class="scrollbar-item"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(1);">Ut</a></td>
					<td class="scrollbar-item"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(2);">St</a></td>
					<td class="scrollbar-item"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(3);">Št</a></td>
					<td class="scrollbar-item"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(4);">Pi</a></td>
					<td class="scrollbar-item"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(5);">So</a></td>
					<td class="scrollbar-item"><a class="exception line" href="javascript:void(0)" onClick="cards.setActive(6);">Ne</a></td>
				</tr>
			</table>
		</div>
		<div id="res-program" style="position: relative; left: -12.5%; height: 300px; width: 112.5%;">
			<div class="card-main">
				<?php 
				$i = 0;
				foreach ($days as $name => $d){
					if ($i == 0){
						?>
						<div class="card card-active">
						<?php
					}
					else{
						?>
						<div class="card card-move-right">
						<?php
					}
					?>
						<div class="info-label program-date">
							<?php echo $name." ".$d['day'].".".$d['month'].".".$d['year'];?>
						</div>
						<div classs="program-table">
						<?php
							$i = 0;
							foreach ($d['m'] as $m => $val){
								$i++;
								?>
								<div class="program-row">
									<div class="program-column program-length"><div><?php echo $movies[$m]['length'];?></div></div>
									<?php 
									if (sizeof($d['m']) == $i){
										?>
										<div class="program-subrow">
										<?php
									}
									else{
										?>
										<div class="program-subrow underline-dark">
										<?php
									}
									?>
									
										<div class="program-column program-title rightsideline-dark"><div><a class="exception line" href="<?php echo base_url()."index.php/film/".$movies[$m]['slug'];?>"><?php echo $movies[$m]['title'];?></a></div></div>
										<div class="program-column program-language rightsideline-dark"><div><?php echo $val['type'];?></div></div>
										<div class="program-column program-time">
											<?php 
											foreach($val['time'] as $t){
												?>
												<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, $t['time_s'] / 100)."%;";?>"><a class="exception line" href="<?php echo base_url()."index.php/rezervacia/".$movies[$m]['slug']."/".$t['time_s']."/".$d['day']."-".$d['month']."-".$d['year'];?>"><?php echo $t['time'];?></a></div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<?php
							}
						?>
						</div>
					</div>
					<?php
					$i++;
				}
				?>
			</div>
		</div>
		 -->
		  
		<form>
			<div>
				<label for="select-movie">Film</label>
				<select id="select-movie">
					<?php 
					foreach ($movies as $m){
						if ($m['slug'] == $selected_m){
							?>
							<option value="<?php echo $m['slug'];?>" selected="<?php echo $m['slug'];?>"><?php echo $m['title'];?></option>
							<?php
						}
						else{
							?>
							<option value="<?php echo $m['slug'];?>"><?php echo $m['title'];?></option>
							<?php
						}
					}
					?>
				</select>
			</div>
			<div>
				<label for="select-time">Čas</label>
				<select id="select-time">
					<?php 
					for ($i = 1700; $i < 2200; $i+=100){
						if (($i % 100) < 10){
							$time_form = ($i / 100).":0".($i % 100);
						}
						else{
							$time_form = ($i / 100).":".($i % 100);
						}
						if ($i == $selected_t){
							?>
							<option value="<?php echo $i;?>" selected="<?php echo $i;?>"><?php echo $time_form;?></option>
							<?php
						}
						else{
							?>
							<option value="<?php echo $i;?>"><?php echo $time_form;?></option>
							<?php
						}
					}
					?>
				</select>
			</div>
			<div>
				<label for="select-date">Dátum</label>
				<select id="select-date">
					<?php 
					$rozdel = explode("-", $selected_d);
					for ($i = 10; $i < 17; $i++){
						$date_form = $i.".".$rozdel[1].".".$rozdel[2];
						if ($i == $rozdel[0]){
							?>
							<option value="<?php echo $i;?>" selected="<?php echo $i;?>"><?php echo $date_form;?></option>
							<?php
						}
						else{
							?>
							<option value="<?php echo $i;?>"><?php echo $date_form;?></option>
							<?php
						}
					}
					?>
				</select>
			</div>
		</form>
		 
		<div id="reservation-button">
			<div class="custom-button custom-button-right">
				<a href="javascript:void(0)" onClick="cards.increment();"><div>Ďalej</div></a>
			</div>
		</div>
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
		<div class="custom-button custom-button-right">
			<a href="<?php echo base_url()."index.php/rezervacia/dokoncenie"?>"><div>Zaplatiť</div></a>
		</div>
	</div>
</div>