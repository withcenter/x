<?php
	echo "DEPRECATED";
	exit;
?><link rel="stylesheet" href="<?=module("$module.css")?>">
<script src="<?=x::url()?>/js/jquery-1.11.0.min.js"/></script>
<script src="<?=x::url()?>/module/update/js/update.js" /></script>
<?php
$ar = explode('/',$source_link);
$project_name = $ar[count($ar)-1];
?>

<form action='?' method='POST' class='ftp_install_form'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>
<input type='hidden' name='source_link' value='<?=$source_link?>'>
<input type='hidden' name='project_name' value='<?=$project_name?>'>

<div class='ftp_install'>
	<img src="<?=module('img/loading.gif')?>"/>
	<div class='ftp_install_fields'>
	<h1>FTP INSTALL</h1>
		Source Link : <?=$source_link?><br>
		Host : <input type='text' name='host' value='<?=$host?>'>
		<br>
		X Folder : <input type='text' name='dir' value='<?=$dir?>'>/theme/<?=$project_name?> to install...<br>

		FTP ID: <input type='text' name='id'><br>
		FTP Password: <input type='text' name='password'><br>
		Port : 22 - SFTP
		<input type='submit'>
	</div>
</div>

</form>

