<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu.php'?>
<?php
	$dir = x::dir() . "/theme/$name";
	if ( etc::is_windows() ) {
		$dir_test = x::dir() . "/theme/theme-writable-test";
		@$re = mkdir( $dir_test );
		if ( $re ) {
			rmdir( $dir_test );
			$writable = true;
		}
	}
?>

<div class='notice'>Type : <?=$type?>, name: <?=$name?></div>



<table>
	<tr valign='top'>
		<td>
			<?include 'admin_uninstall_ssh_form.php'?>
		</td>
		<? if ( $writable ) { ?>
		<td>
			<?include 'admin_uninstall_direct_form.php'?>
		</td>
		<? } ?>
	</tr>
</table>

