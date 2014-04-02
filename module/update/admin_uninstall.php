<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu.php'?>
<?php
	$a = explode('/', $source_link);
	$pname = $a[ count($a) - 1 ];
	$dir = x::dir() . "/theme/$pname";
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
			<?include 'admin_ftp_uninstall_form.php'?>
		</td>
		<? if ( $writable ) { ?>
		<td>
			<?include 'admin_direct_uninstall_form.php'?>
		</td>
		<? } ?>
	</tr>
</table>
