
			<?php
				$dirs = file::getDirs(X_DIR_THEME);
			?>
			<select name='theme'>
			<?php
				
				$option = array();
				foreach ( $dirs as $dir ) {
					$path = X_DIR_THEME . "/$dir/config.php";
					if ( ! file_exists($path) ) continue;
					$theme_config = array();
					include $path;
					if ( empty($theme_config['name']) ) continue;
						
					$type = explode(',', $theme_config['type']);
					// if ( in_array( 'mobile', $type ) ) continue;
					// if ( in_array( 'subsite', $type ) ) continue;
						
						echo "<option value='$dir'";
						if ( $cfg['theme'] == $dir ) echo " selected='1'";
						echo ">$theme_config[name]</value>";
				}
			?>
			</select>
		