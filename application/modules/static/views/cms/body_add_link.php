<div>
	<?php
	if (($error = validation_errors()) != ""){
		echo "<div class='form-error'>".$error."</div>";
	}
	echo form_open_multipart("cms/static/edit_link/".$link['id']);
	?>
		<div>
			<label for="page">Priečinok</label>
			<select id="page" name="page">
				<?php
				if (isset($page)){ 
					foreach ($page as $p){
						?>
						<option value="<?php echo $p['id'];?>" <?php echo set_select('page', $p['id'], $p['id'] == $link['page_id']);?>><?php echo $p['folder'];?></option>
						<?php
					}
				}
				?>
			</select>
		</div>
		<div>
			<label for="block">Časť</label>
			<select id="block" name="block">
				<?php
				if (isset($block)){ 
					foreach ($block as $b){
						?>
						<option value="<?php echo $b['id'];?>" <?php echo set_select('block', $b['id'], $b['id'] == $link['block_id']);?>><?php echo $b['block'];?></option>
						<?php
					}
				}
				?>
			</select>
		</div>
		<div>
			<label for="position">Pozícia</label>
			<input id="position" type="text" name="position" value="<?php echo set_value('position', $link['position']);?>" />
		</div>
		<div>
			<input class="save" type="submit" name="save" value=" Uložiť " />
		</div>
	</form>
</div>