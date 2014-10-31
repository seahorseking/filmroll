<table>
	<tr class="table_border">
		<td>NÁZOV</td>
		<td>SKRATKA</td>
		<td>PREDVOLENÝ</td>
		<td></td>
		<td></td>
	</tr>
	<?php 
	if (isset($get_language)){
		foreach ($get_language as $l){
			?>
			<tr>
				<td><?php echo $l['lang_name'];?></td>
				<td><?php echo $l['lang_shortcut'];?></td>
				<td><?php echo $l['lang_default'];?></td>
				<td><a href="<?php echo base_url()."index.php/cms/multilanguage/add/".$l['id'];?>" title="Editovať"><img src="<?php echo assets_url()."images/advanced-options.png";?>"/></a></td>
				<td><a class="delete" href="<?php echo base_url()."index.php/cms/multilanguage/remove/".$l['id'];?>" title="Odstrániť"><img src="<?php echo assets_url()."images/DeleteButton.png";?>"/></a></td>
			</tr>
			<?php
		}
	}
	?>
</table>
<?php 
page_div($page, $page_offset, $page_last, $page_link, true);
?>