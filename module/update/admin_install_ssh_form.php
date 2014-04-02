<div class="admin-install-ssh">

	<h1>SSH INSTALL</h1>

	<form action='?' method='POST'>
	<input type='hidden' name='module' value='<?=$module?>'>
	<input type='hidden' name='action' value='admin_install_ssh_submit'>
	<input type='hidden' name='theme' value='y'>
	<input type='hidden' name='source_link' value='<?=$source_link?>'>
	<input type='hidden' name='type' value='<?=$type?>'>
	<input type='hidden' name='name' value='<?=$name?>'>

		<div class='ftp_install'>
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
</div>


