<table>
	<tr class="table_border">
		<td>PRIEČINOK</td>
		<td>ČASŤ</td>
		<td>POZÍCIA</td>
		<td></td>
	</tr>
	<?php
	foreach($links as $l){
		?>
		<tr>
			<td><?php echo $l['folder'];?></td>
			<td><?php echo $l['block'];?></td>
			<td><?php echo $l['position'];?></td>
			<td><a href = "<?php echo base_url()."index.php/cms/static/edit_link/".$l["id"];?>" title="Editovať"><img src="<?php echo assets_url()."images/advanced-options.png";?>"/></a></td>
			<td><a class="delete" href = "<?php echo base_url()."index.php/cms/static/remove_link/".$l["id"];?>" title="Odstrániť"><img src="<?php echo assets_url()."images/DeleteButton.png";?>"/></a></td>
		</tr>
		<?php
	}
	?>
</table>
<?php 
page_div($page, $page_offset, $page_last, $page_link, true);
?>