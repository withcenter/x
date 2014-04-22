<?php
	widget_css();
?>

<div class='login'>
	<div class='inner'>
		<?php
			if ( login() ) include 'login-info.php';
			else include 'login-form.php';
		?>
	</div>
</div>

