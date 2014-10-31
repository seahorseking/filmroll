<div>
	<?php 
	if (($error = validation_errors()) != ""){
		echo "<div class='form-error'>".$error."</div>";
	}
	echo form_open("cms/admin/login/login");
	?>
		<div>
			<label for="name">Meno</label>
			<input id="name" name="name" type="text" value="<?php echo set_value('name');?>">
		</div>
		<div>
			<label for="password">Heslo</label>
			<input id="password" name="password" type="password">
		</div>
		<div>
			<input class="save" name="login" type="submit" value=" Prihlásiť sa ">
		</div>
	</form>
</div>