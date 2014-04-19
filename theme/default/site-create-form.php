
<div class='page-header'>
사이트 생성
</div>
<div class='content'>

			<form action='?'>
				<input type='hidden' name='module' value='site'>
				<input type='hidden' name='action' value='site_create_submit'>
				
				
					<table>
						<tr>
							<td><span class='item'>사이트 주소</span></td>
							<td>http://</td>
							<td><input type='text' name='sub_domain'>.<?=etc::base_domain()?></td>
						</tr>
						<tr>
							<td><span class='item'>사이트 제목</span></td>
							<td></td>
							<td><input type='text' name='title'></td>
						</tr>
						<tr>
							<td><span class='item'>테마 선택</span></td>
							<td></td>
							<td>
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
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input class='site-create-submit' type='submit' value='생성'></td>
						</tr>
						
					</table>
					
					
					
					
					</form>
			
</div>
