<?php

	$cwd = getcwd();
	$host = $_SERVER['HTTP_HOST'];
	$dir = "$cwd/$dir";
	
	
?>

<h1>FTP DELTE</h1>

<form action='?' method='POST' target='hiframe'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>



Host : <input type='text' name='host' value='<?=$host?>'>
<br>
Dir : <input type='text' name='dir' value='<?=$dir?>'> to delete...<br>

FTP ID: <input type='text' name='id'><br>
FTP Password: <input type='text' name='password'><br>
Port : 22 - SFTP

<br>

<input type='submit'>
</form>

<iframe name='hiframe' src="javascript:void(0);" style='width: 100%; height: 400px;"></iframe>

