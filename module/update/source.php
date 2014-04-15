<?php
	include 'dist-menu.php';
	
?>
<form action='?' method='POST' enctype='multipart/form-data'>
	<input type='hidden' name='module' value='<?=$module?>'>
	<input type='hidden' name='action' value='<?=$action?>_submit'>
	<input type='hidden' name='theme' value='y'>
	
	Upload 'config.xml' : <input type="file" name="config">
	
	<input type="submit">
</form>

