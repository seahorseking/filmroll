<div>
	<?php 
	if (($error = validation_errors()) != ""){
		echo "<div class='form-error'>".$error."</div>";
	}
	echo form_open("cms/static/add/".$page['id']);
	?>
		<div>
			<?php 
			if ($page['id'] == 0){
				?>
				<label for="folder">Priečinok</label>
				<input id="folder" name="folder" value="<?php echo set_value('folder')?>">
				<?php 
			}
			?>
		</div>
		<?php 
		if (isset($language)){
			foreach ($language as $l){
				?>
				<div>
					<label for="<?php echo "title_".$l['lang_shortcut'];?>"><?php echo "Nadpis - ".$l['lang_name']."";?></label>
					<input id="<?php echo "title_".$l['lang_shortcut'];?>" name="<?php echo "title_".$l['lang_shortcut'];?>" value="<?php echo set_value("title_".$l['lang_shortcut'], get_lang_value($page['page_title'], $l['id']))?>">
				</div>
				<?php
			}
		}
		?>
		<div>
			<label for="dynamic">Dynamická</label>
			<input id="dynamic" name="dynamic" type="checkbox" value="1" <?php echo set_checkbox("dynamic", '1', $page['dynamic'] == 1);?>">
		</div>
		<div>
			<input class="save" name="save" type="submit" value=" Uložiť ">
		</div>
	</form>
</div>