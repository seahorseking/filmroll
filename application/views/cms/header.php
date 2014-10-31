	<div id="logo">
			<a href="<?php echo base_url()."index.php/cms"?>"><img src="<?php echo assets_url()."images/index_logo_white.png";?>" width="150" height="45"></a>
	</div>
	<div id="location">
		<div class="outercenter"> 
		<div class="innercenter">
			<?php if (isset($path)) {
				$i = 0;
				foreach ($path as $p) {
					if ($i>=1){
						?>
						<div style="padding: 0px 10px; float:left;"><p style="float:left;">/</p></div>
						<?php
					}
					?>
					<p style="float:left;"><a href="<?php echo $p["link"];?>"><?php echo mb_strtoupper($p["text"]);?></a></p>
					<?php $i++;
				}
			}?>
		</div>
		</div>
	</div>
	<div id="login">
		<p><a href="<?php echo $login["link"];?>"><?php echo $login["text"];?></a></p>
	</div>
