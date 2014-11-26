<?php 
function get_left($from, $to, $val){
	return ($val - $from) / ($to - $from) * 80;
}
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
$start = array(
		array(
				'cinema' => 'Aupark',
				'time' => "15:00",
				'time_s' => "1500",
				'movie' => 0,
				'type' => "EN",
		),
		array(
				'cinema' => 'Eurovea',
				'time' => "15:00",
				'time_s' => "1500",
				'movie' => 1,
				'type' => "EN",
		),
		array(
				'cinema' => 'Eurovea',
				'time' => "15:30",
				'time_s' => "1530",
				'movie' => 0,
				'type' => "EN",
		),
		array(
				'cinema' => 'Eurovea',
				'time' => "16:00",
				'time_s' => "1600",
				'movie' => 2,
				'type' => "EN",
		),
		array(
				'cinema' => 'Aupark',
				'time' => "16:30",
				'time_s' => "1630",
				'movie' => 2,
				'type' => "EN",
		),
		array(
				'cinema' => 'Aupark',
				'time' => "17:30",
				'time_s' => "1730",
				'movie' => 1,
				'type' => "EN",
		),
);
$timeline_from = 15;
$timeline_to = 17.5;
?>
<div class="title1">
	Práve začína
</div>
<div style="position: relative; left: -12.5%; height: 300px; width: 112.5%;">
	<div classs="program-table">
	<?php
		$i = 0;
		foreach ($start as $s){
			$i++;
			?>
			<div class="program-row">
				<div class="program-column program-length"><div><?php echo $movies[$s['movie']]['length'];?></div></div>
				<?php 
				$class = "";
				if (sizeof($start) != $i){
					$class = "underline-dark";
				}
				?>
				<div class="program-subrow <?php echo $class;?>">
					<div class="program-column program-title rightsideline-dark"><div><a class="exception line" href="<?php echo base_url()."index.php/film/".$movies[$s['movie']]['slug'];?>"><?php echo $movies[$s['movie']]['title'];?></a></div></div>
					<div class="program-column program-language rightsideline-dark"><div><?php echo $s['type'];?></div></div>
					<div class="program-column program-now-time">
						<div class="program-column program-now-time-item rightsideline-dark" style="padding: 0px;"><div><a class="exception line" href="<?php echo base_url()."index.php/rezervacia/".$movies[$s['movie']]['slug']."/".$s['time_s']."/15-12-2014";?>"><?php echo $s['time'];?></a></div></div>
					</div>
					<div class="program-column program-cinema"><?php echo $s['cinema'];?></div>
				</div>
			</div>
			<?php
		}
	?>
	</div>
</div>