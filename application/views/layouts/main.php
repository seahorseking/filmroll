<?php
$kino = array(
		array(
				'name' => "Aupark",
				'top' => (270/505*100)."%",
				'left' => (270/670*100)."%",
				'class' => "selected",
				'bus' => array(8, 23, 96),
		),
		array(
				'name' => "Eurovea",
				'top' => (240/505*100)."%",
				'left' => (310/670*100)."%",
				'class' => "",
				'bus' => array(5, 6, 13, 67, 82),
		),
);
?>
<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo assets_url()."style/card.css";?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo assets_url()."style/invis_scroll.css";?>" />
		<?php 
		if (isset($style)){
			foreach ($style as $s){
				?>
				<link rel="stylesheet" type="text/css" href="<?php echo assets_url()."style/".$s.".css";?>" />
				<?php
			}	
		}
		?>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="<?php echo assets_url()."jscript/events.js";?>"></script>
		<script type="text/javascript" src="<?php echo assets_url()."jscript/engine.js";?>"></script>
		<script type="text/javascript" src="<?php echo assets_url()."jscript/invis_scroll.js";?>"></script>
		<?php 
		if (isset($jscript)){
			foreach ($jscript as $j){
				?>
				<script type="text/javascript" src="<?php echo assets_url()."jscript/".$j.".js";?>"></script>
				<?php
			}
		}
		if (isset($language) && isset($lang_use) && isset($lang_label)){
			foreach ($language as $l){
				if ($l['id'] != $lang_use['id']){
					?>
					<link rel="alternate" hreflang="<?php echo $l['lang_shortcut'];?>" href="<?php echo $lang_label[$l['lang_shortcut']]['link'];?>">
					<?php
				}
			}
		}
		?>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="keywords" content="">
		<meta name="description" content="" />
		<link rel="shortcut icon" href="" type="image/x-icon" />
		<title><?php echo $title;?></title>
	</head>
	<body>
		
		<div id="main">
			<div id="side">
				<?php echo $side;?>
			</div>
			
			<div id="body">
				
				<div id="menu" style="display:none;">
					<div style="position:relative;">
						<img src="<?php echo base_url()."assets/images/bratislava_gs.png";?>">
						<?php 
						foreach ($kino as $k){
							?>
							<div class="cinema-place scrollbar-item <?php echo $k['class'];?>" style="<?php echo "top: ".$k["top"]."; left: ".$k["left"].";";?>">
								<div class="cinema-point"></div>
								<div class="cinema-name"><a class="exception line" href="javascript:void(0)"><?php echo $k["name"];?></a></div>
							</div>
							<?php
						}
						?>
					</div>
					<div class="card-main font-border">
						<div class="card card-active">
							<div class="title3" style="float:left;padding: 5px 10px 20px 10px;">
								Spoje
							</div>
							<div class="bus-body">
							<?php 
								foreach($kino[0]['bus'] as $bus){
									?>
									<div class="bus">
										<?php echo $bus;?>
									</div>
									<?php
								}
							?>
							</div>
						</div>
						<div class="card card-move-right">
							<div class="title3" style="float:left;padding: 5px 10px 20px 10px;">
								Spoje
							</div>
							<div class="bus-body">
							<?php 
								foreach($kino[1]['bus'] as $bus){
									?>
									<div class="bus">
										<?php echo $bus;?>
									</div>
									<?php
								}
							?>
							</div>
						</div>
					</div>
				</div>
				
				<div id="header">
	            	<?php echo $header;?>
		        </div>
		
				<div id="content">
		            <?php echo $body;?>	
			    </div>
			    
			    <div id="footer">
			    	<?php echo $footer;?>
			    </div>
			</div>
		</div>
	</body>
</html>