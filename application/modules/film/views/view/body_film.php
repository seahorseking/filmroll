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
$cinema = array('Aupark', 'Eurovea');
$days = array(
		'pondelok' => array(
				'day' => '10',
				'month' => '12',
				'year' => '2014',
				'c' => array(
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
		'utorok' => array(
				'day' => '11',
				'month' => '12',
				'year' => '2014',
				'c' => array(
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
				'c' => array(
						0 => array(
								'type' => "EN",
								'time' => array(
									array(
											'time' => "18:00",
											'time_s' => "1800",
									),
								),
						),
				),
		),
		'štvrtok' => array(
				'day' => '13',
				'month' => '12',
				'year' => '2014',
				'c' => array(
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
				'c' => array(
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
				'c' => array(
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
				),
		),
		'nedela' => array(
				'day' => '16',
				'month' => '12',
				'year' => '2014',
				'c' => array(
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
);
?>
<div class="title1">
	<?php echo $movie['title'];?>
</div>
<div>
	<table>
		<tr class="title3">
			<td><?php echo $movie['genre'];?></td>
			<td><?php echo $movie['length'];?></td>
			<td><?php echo $movie['origin'];?></td>
			<td><a href="<?php echo $movie['csfd'];?>" target="_blank"><img src="<?php echo base_url()."assets/images/csfd.png";?>"></a></td>
		</tr>
	</table>
</div>
<div>
	<p>
		<?php echo $movie['description'];?>
	</p>
</div>
<div class="highlight-panel">
	<div id="trailler">
		<a href=""><img src="<?php echo $movie['trailler'];?>"></a>
	</div>
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

<div id="program" style="position: relative; left: -12.5%; height: 110px; width: 112.5%;">
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
					foreach ($d['c'] as $m => $val){
						$i++;
						?>
						<div class="program-row">
							<div class="program-column program-length"><div></div></div>
							<?php 
							if (sizeof($d['c']) == $i){
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
							
								<div class="program-column program-title rightsideline-dark"><div><?php echo $cinema[$m];?></div></div>
								<div class="program-column program-language rightsideline-dark"><div><?php echo $val['type'];?></div></div>
								<div class="program-column program-time">
									<?php 
									foreach($val['time'] as $t){
										?>
										<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, $t['time_s'] / 100)."%;";?>"><a class="exception line" href="<?php echo base_url()."index.php/rezervacia/".$movie['slug']."/".$t['time_s']."/".$d['day']."-".$d['month']."-".$d['year'];?>"><?php echo $t['time'];?></a></div>
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