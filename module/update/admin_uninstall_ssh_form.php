<div class="admin-uninstall-ssh">

	<h1>SSH2(SFTP) UN-INSTALL</h1>

	<form action='?' method='POST'>
	<input type='hidden' name='module' value='<?=$module?>'>
	<input type='hidden' name='action' value='admin_uninstall_ssh_submit'>
	<input type='hidden' name='theme' value='y'>
	<input type='hidden' name='type' value='<?=$type?>'>
	<input type='hidden' name='name' value='<?=$name?>'>
	
	Host : <input type='text' name='host' value='<?=etc::domain()?>'>
	<br>
	X Folder : <input type='text' name='dir' value='<?=x::dir()?>' style='width: 180px;'><br>
	SSH2(SFTP) ID: <input type='text' name='id'><br>
	SSH2(SFTP) Password: <input type='text' name='password'><br>
	<br>
	<input type='submit'>

	</form>
</div>


