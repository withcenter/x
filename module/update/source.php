<?php
	include 'dist-menu.php';
?>
<form action='?' method='POST'>
	<input type='hidden' name='module' value='<?=$module?>'>
	<input type='hidden' name='action' value='<?=$action?>_submit'>
	<input type='hidden' name='theme' value='y'>
	
	Input github.com project URL : <input name="project_url" style="width:300px;">
	
	<input type="submit">
</form>

