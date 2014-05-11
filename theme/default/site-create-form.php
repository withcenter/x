
<div class='page-header'>
	<div>
		사이트 생성
	</div>
</div>
<div class='content'>

			<form action='?'>
				<input type='hidden' name='module' value='site'>
				<input type='hidden' name='action' value='site_create_submit'>
				
				
					<table cellpadding=0 cellspacing=0 width='100%'>
						<tr valign='top'>
							<td width='100px'><div class='label first'>사이트 주소</div></td>							
							<td><input type='text' name='sub_domain' autocomplete='off'></td>
						</tr>
						<tr valign='top'>
							<td><div class='label'>사이트 제목</div></td>							
							<td><input type='text' name='title' autocomplete='off'></td>
						</tr>
						<? if ( config('site_create_form_theme') == 'hide' ) { ?>
							<?
								$default_theme = config('site_create_theme_default');
								if ( empty($default_theme) ) jsAlert("Error: No default theme is selected when it is set to use default theme.");
							?>
							<input type="hidden" name="theme" value="<?=$default_theme?>">
						<? } else { ?>
						<tr valign='top'>
							<td><div class='label'>테마 선택</div></td>							
							<td>
								<div class='select_theme'>
									<select name='theme'>
									<?php
										foreach ( file::getDirs( X_DIR_THEME ) as $dir ) {
											$path = X_DIR_THEME . "/$dir/config.xml";
											if ( ! file_exists( $path ) ) continue;
											$theme_config = load_config( $path );
											if ( ! $theme_config ) continue;
											
											$name = $theme_config['name'][L];
											if ( empty($name) ) continue;
											
											$view = explode(',', $theme_config['view']);
											if ( ! in_array( 'pc', $view ) ) continue;
											
											echo "<option value='$dir'>$name</option>";
										}
									?>
									</select>								
								</div>
							</td>
						</tr>
						<? } ?>
						<tr valign='top'>													
							<td colspan=3>
								<div class = 'submit_create_button' ><input class='site-create-submit' type='submit' value='생성'></div>
							</td>
						</tr>
						
					</table>
					
					
					
					
					</form>
			
</div>
