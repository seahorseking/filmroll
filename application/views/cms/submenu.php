<?php
if (isset($submenu)){
	foreach($submenu as $m){
		?>
		<a href="<?php echo $m['link'];?>">
		<div class="menu_box">
			<h4><?php echo $m['text'];?></h4>
			<div class="vertic_space_item">
			</div>
		</div>
		</a>
		<?php
	}
}