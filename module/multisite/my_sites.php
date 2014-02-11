<?
	if ( ! login() ) return include login_first();
?>

<div class='view-site'>
	<div>
		<h2> Site List </h2>
		<ul>
			<?php
				foreach ( ms::my_site() as $site ) {
				date_default_timezone_set("UTC");
				$date_created = date("(T) m/d/Y, h:iA",($site['stamp_create']));				
			 ?>
				<li>
					<a href="<?=ms::url_site($site['domain'])?>">
						<div class='info'>Domain Name: <?=$site['domain']?></div>
						<div class='info'>Site Title: <?=$site['title']?></div>
						<div class='info'>Date Created: <?=$date_created?></div>				
					</a>
				</li>
			<? }?>
		</ul>
	</div>
</div>