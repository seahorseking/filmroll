<?php 
if (isset($language_option)){
	?>
	<div id="language">
	<?php
	foreach ($language_option as $l){
		?>
		<div class="language-item">
			<a class="<?php echo $l['class'];?>" href="<?php echo $l['link'];?>"><?php echo $l['text'];?></a>
		</div>
		<?php
	}
	?>
	</div>
	<?php
}
?>