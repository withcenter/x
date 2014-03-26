<?php

//	$cwd = getcwd();
//	$host = $_SERVER['HTTP_HOST'];
//	$dir = "$cwd/$dir";
	
	


$ar = explode('/',$source_link);
$project_name = $ar[count($ar)-1];
?>

<h1>FTP INSTALL</h1>

<form action='?' method='POST'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>



Source Link : <?=$source_link?><br>
Host : <input type='text' name='host' value='<?=$host?>'>
<br>
X Folder : <input type='text' name='dir' value='<?=$dir?>'>/theme/<?=$project_name?> to install...<br>

FTP ID: <input type='text' name='id'><br>
FTP Password: <input type='text' name='password'><br>
Port : 22 - SFTP

<br>

<input type='submit'>
</form>
