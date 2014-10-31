<table>
	<tr class="table_border">
		<td>PRIEČINOK</td>
		<td>NADPIS</td>
		<td>DYNAMICKÁ</td>
		<td></td>
		<?php 
		if (isset($language)){
			foreach ($language as $l){
				?>
				<td></td>
				<?php
			}
		}
		?>
	</tr>
	<?php 
	if (isset($pages)){
		foreach ($pages as $p){
			?>
			<tr>
				<td><?php echo $p['folder'];?></td>
				<td><?php echo get_lang_value($p['page_title']);?></td>
				<td><?php echo $p['dynamic'];?></td>
				<td><a href="<?php echo base_url()."index.php/cms/static/add/".$p['id'];?>" title="Editovať"><img src="<?php echo assets_url()."images/advanced-options.png";?>"/></a></td>
				<?php
				if ($p['dynamic'] == 0 && isset($language)){
					foreach ($language as $l){
						?>
						<td><a href="<?php echo base_url()."index.php/cms/static/edit/".$p['id']."/".$l['lang_shortcut'];?>"><?php echo $l['lang_shortcut'];?></a></td>
						<?php
					}
				}
				?>
			</tr>
			<?php
		}
	}
	?>
</table>
<?php 
page_div($page, $page_offset, $page_last, $page_link, true);
?>