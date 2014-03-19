
	<div class='config-main-container'>

		<div class='config-wrapper'>						
			<div class='config-title'>
				<span class='config-title-info'>회원 스킨 선택</span>
				<span class='config-title-notice'>
					<span class='user-google-guide-button' page = 'google_doc_global' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
					<img src='<?=module('img/setting_2.png')?>'>
				</span>
			</div>
			
			<div class='config-container'>

			<div class='hidden-google-doc google_doc_global'></div>
			
			
				<table cellpadding='0' cellspacing='0' width='100%'>
					<tr valign='top'>
						<td width='120'>
							<span class='config-name'>스킨 폴더</span>
						</td>
						<td>
							<?php
							
								$dirs = file::getDirs( x::dir() . '/skin/member' );
							?>
							<select name='member_skin'>
							
								<? foreach ( $dirs as $dir ) { ?>
									<option value='<?=$dir?>'<? if ( $dir == x::$config['site']['member_skin'] ) echo ' selected=1' ?>><?=$dir?></option>
								<? } ?>

							</select>
						</td>
					</tr>
				</table>
				
			</div>
			
				<input type='submit' value='업데이트' class='per-config-submit'>
				<div style='clear:right;'></div>
		
		</div>
	</div>
	