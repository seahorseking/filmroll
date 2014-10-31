<?php 
$menu = array(
		0 => array(
				'link' => base_url()."index.php/program",
				'text' => "Program",
		),
		1 => array(
				'link' => base_url()."index.php/pripravujeme",
		'text' => "Pripravujeme",
		),
		2 => array(
				'link' => base_url()."index.php/mapa",
		'text' => "Mapa",
		),
);
?>
<div id="header-logo">
	<a href="<?php echo base_url()."index.php/".$language['link'];?>"><img src="<?php echo assets_url()."images/logo.png";?>"></a>
</div>
<div id="header-menu">
<?php
foreach ($menu as $bar){
	?>
	<div class="header-menu-item">
		<a href="<?php echo $bar['link'];?>"><?php echo $bar['text'];?></a>
	</div>
	<?php
}
?>
</div>