
<form action='?' method='POST' class='ftp_install_form'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>
<input type='hidden' name='source_link' value='<?=$source_link?>'>
<input type='hidden' name='project_name' value='<?=$pname?>'>

<div class='ftp_install'>
	<div class='ftp_install_fields'>
	<h1>FTP INSTALL</h1>
		Host : <input type='text' name='host' value='<?=etc::domain()?>'>
		<br>
		X Folder : <input type='text' name='dir' value='<?=x::dir()?>' style='width: 180px;'><br>

		FTP ID: <input type='text' name='id'><br>
		FTP Password: <input type='text' name='password'><br>
		Port : 22 - SFTP
		<br>
		<input type='submit'>
	</div>
</div>

</form>

