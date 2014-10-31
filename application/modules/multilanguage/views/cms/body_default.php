<div>
	<?php 
	if (($error = validation_errors()) != ""){
		echo "<div class='form-error'>".$error."</div>";
	}
	echo form_open("cms/multilanguage/def");
	?>
		<div>
			<label for="default">Predvolený</label>
			<select id="default" name="default">
				<?php 
				if (isset($language)){
					foreach ($language as $l){
						?>
						<option value="<?php echo $l['id'];?>" <?php echo set_select('default', $lang_def['id'], $lang_def['id'] == $l['id']);?>><?php echo $l['lang_shortcut'];?></option>
						<?php
					}
				}
				?>
			</select>
		</div>
		<div>
			<input class="save" name="save" type="submit" value="Uložiť">
		</div>
	</form>
</div>