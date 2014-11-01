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
?>
<div class="title1">
	Program
</div>
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

<div style="position: relative; left: -12.5%; height: 300px; width: 112.5%;">
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
					foreach ($d['m'] as $m => $val){
						?>
						<div class="program-row">
							<div class="program-column program-length"><div><?php echo $movies[$m]['length'];?></div></div>
							<div class="program-subrow underline-dark">
								<div class="program-column program-title rightsideline-dark"><div><?php echo $movies[$m]['slug'];?></div></div>
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
			<!-- 
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="<?php echo base_url()."index.php/rezervacia/the-interview/1800/10-12-2014"?>">18:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>2:10</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>1:50</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>The Fighter</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK dab</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 21)."%;";?>"><a class="exception line" href="">21:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-move-right">
			<div class="info-label program-date">
				utorok 11.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>2:10</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-move-right">
			<div class="info-label program-date">
				streda 12.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>2:10</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-move-right">
			<div class="info-label program-date">
				štvrtok 13.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>2:10</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-move-right">
			<div class="info-label program-date">
				piatok 14.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 19)."%;";?>"><a class="exception line" href="">18:00</a></div>
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 21)."%;";?>"><a class="exception line" href="">21:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>2:10</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-move-right">
			<div class="info-label program-date">
				sobota 15.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>2:10</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 17)."%;";?>"><a class="exception line" href="">17:00</a></div>
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 19)."%;";?>"><a class="exception line" href="">19:00</a></div>
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 21)."%;";?>"><a class="exception line" href="">21:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>1:50</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>The Fighter</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK dab</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-move-right">
			<div class="info-label program-date">
				nedela 16.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="">18:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>Interstellar</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK tit</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 20)."%;";?>"><a class="exception line" href="">20:00</a></div>
						</div>
					</div>
				</div>
				<div class="program-row">
					<div class="program-column program-length"><div>1:50</div></div>
					<div class="program-subrow">
						<div class="program-column program-title rightsideline-dark"><div>The Fighter</div></div>
						<div class="program-column program-language rightsideline-dark"><div>SK dab</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 21)."%;";?>"><a class="exception line" href="">21:00</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		 -->
	</div>
</div>