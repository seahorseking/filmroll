<?php 
$film_movie = array("the-interview", "interstellar", "the-fighter", "disconnect");
?>
<div id="search">
	<div class="out-center-x">
		<div class="in-center-x">
			<input id="search-box" type="text" name="search" >
			<img id="search-icon" src="<?php echo base_url()."assets/images/search_icon.png";?>">
		</div>
	</div>
</div>
<div id="posters-film" class="invis-scroll-view">
	<div class='invis-scroll-arrow invis-scroll-arrow-up' style="display: none;"></div>
	<div id="posters-body" class="invis-scroll">
		<div id="posters">
			<?php 
			foreach ($film_movie as $fm){
				if (!isset($movie) || $fm == $movie['slug']){
					?>
					<div class="poster-item">
						<a href="<?php echo base_url()."index.php/film/".$fm?>"><img src="<?php echo base_url()."assets/images/posters/".$fm.".png";?>"></a>
					</div>
					<?php
				}
				else{
					?>
					<div class="poster-item">
						<a href="<?php echo base_url()."index.php/film/".$fm?>"><img class="opacity" src="<?php echo base_url()."assets/images/posters/".$fm.".png";?>"></a>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<div class='invis-scroll-arrow invis-scroll-arrow-down' style="display: none;"></div>
</div>