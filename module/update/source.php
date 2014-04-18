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

<br>

@warning: you have to wait for 10 minutes or more for your config.xml to be applied into raw git server.
