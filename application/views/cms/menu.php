<?php
if (isset($menu)){
	foreach($menu as $m){
		?>
		<a href="<?php echo $m['link'];?>">
		<div class="menu_box">
			<h3><?php echo $m['text'];?></h3>
			<div class="vertic_space">
			</div>
		</div>
		</a>
		<?php
	}
}