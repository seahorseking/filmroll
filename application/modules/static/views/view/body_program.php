<?php 
function get_left($from, $to, $val){
	return ($val - $from) / ($to - $from) * 80;
}
$timeline_from = 18;
$timeline_to = 21;
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
		<div class="card card-active">
			<div class="info-label program-date">
				pondelok 10.12.2014
			</div>
			<div classs="program-table">
				<div class="program-row">
					<div class="program-column program-length"><div>1:30</div></div>
					<div class="program-subrow underline-dark">
						<div class="program-column program-title rightsideline-dark"><div>The Interview</div></div>
						<div class="program-column program-language rightsideline-dark"><div>EN</div></div>
						<div class="program-column program-time">
							<div class="program-column program-time-item" style="<?php echo "left: ".get_left($timeline_from, $timeline_to, 18)."%;";?>"><a class="exception line" href="<?php echo base_url()."index.php/rezervacia/the-interview/1800"?>">18:00</a></div>
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
	</div>
</div>