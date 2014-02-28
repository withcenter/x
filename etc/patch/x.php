<?php
	if ( copy('etc/x.php', "$dir_root/extend/x.php") ) {
		patch_message("patched : copy x.php -> extend/x.php");
	}
	else patch_failed();
	
	
	