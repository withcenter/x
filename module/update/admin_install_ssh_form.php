
<form action='?' method='POST' class='ftp_install_form'>
<input type='hidden' name='module' value='<?=$module?>'>
<input type='hidden' name='action' value='<?=$action?>_submit'>
<input type='hidden' name='source_link' value='<?=$source_link?>'>
<input type='hidden' name='project_name' value='<?=$pname?>'>

<div class='ftp_install'>
	<h1>SSH INSTALL</h1>
	<div class='ftp_install_fields'>
		Host : <input type='text' name='host' value='<?=etc::domain()?>'>
		<br>
		X Folder : <input type='text' name='dir' value='<?=x::dir()?>' style='width: 180px;'><br>

		SSH(SFTP) ID: <input type='text' name='id'><br>
		SSH(SFTP) Password: <input type='text' name='password'><br>
		<br>
		<input type='submit'>
	</div>
</div>

</form>

