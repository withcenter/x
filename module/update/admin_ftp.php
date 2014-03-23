<?php

	$cwd = getcwd();
	$host = $_SERVER['HTTP_HOST'];
	$dir = "$cwd/$dir";
	
	
?>
<form action='?' method='POST' target='hiframe'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>
<input type='hidden' name='host' value='<?=$host?>'>
<input type='hidden' name='dir' value='<?=$dir?>'>

Host : <?=$host?>
Directory to be removed : <?=$dir?><br>
FTP ID: <input type='text' name='id'><br>
FTP Password: <input type='text' name='password'><br>

<input type='submit'>
</form>

<iframe name='hiframe' src="javascript:void(0);" style='width: 100%; height: 400px;"></iframe>

