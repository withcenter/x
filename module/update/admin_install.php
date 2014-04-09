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

<p>
</p>



<div class='notice'>
	Type : <?=$type?>, name: <?=$pname?><br>
	Source Link : <?=$source_link?>
</div>



		
		

<table width='100%'>
	<tr valign='top'>
		<td width='50%'>
			<?include 'admin_install_ssh_form.php'?>
		</td>
		<? if ( $writable ) { ?>
		<td width='50%'>
			<?include 'admin_install_direct_form.php'?>
		</td>
		<? } ?>
	</tr>
</table>
