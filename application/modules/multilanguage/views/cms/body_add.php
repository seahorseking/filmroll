<div>
	<?php 
	if (($error = validation_errors()) != ""){
		echo "<div class='form-error'>".$error."</div>";
	}
	echo form_open("cms/multilanguage/add/".$lang_db['id']);
	?>
		<div>
			<label for="name">Názov</label>
			<input id="name" name="name" value="<?php echo set_value('name', $lang_db['lang_name']);?>">
		</div>
		<div>
			<label for="shortcut">Skratka</label>
			<input id="shortcut" name="shortcut" value="<?php echo set_value('shortcut', $lang_db['lang_shortcut']);?>">
		</div>
		<div>
			<input class="save" name="save" type="submit" value="Uložiť">
		</div>
	</form>
</div>