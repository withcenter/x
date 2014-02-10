<?
	if ( ! login() ) return include login_first();
?>

<div class='create-site'>
	<div>
	<h1>Create Your Site</h1>
		<form action='?'>
			<input type='hidden' name='module' value='multisite'>
			<input type='hidden' name='action' value='create_submit'>
				<div>Domain: http://<input type='text' name='sub_domain'>.<?=etc::base_domain()?></div>
				<div>Site Title: <input type='text' name='title'></div>
				<input type='submit' value='Create Site'>
		</form>
	</div>
	<div>
		<h2> Site List </h2>
		<ul>
			<?php
				foreach ( ms::my_site() as $site ) {
			 ?>
				<li><a href="<?=ms::url_site($site['domain'])?>">Domain Name: <?=$site['domain']?><br>Site Title: <?=$site['title']?></a></li>
			<? }?>
		</ul>
	</div>
</div>