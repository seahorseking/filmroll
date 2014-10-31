<!doctype html>
<html>
	<head>
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