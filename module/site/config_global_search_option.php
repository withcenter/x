
	<div class='config-main-container'>

		<div class='config-wrapper'>						
			<div class='config-title'>
				<span class='config-title-info'>검색 옵션</span>
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
							<span class='config-name'>전체 사이트</span>
						</td>
						<td>
							<input type='checkbox' name='search_all_site' value='Y'<? if ( meta_get('search_all_site') == 'Y' ) echo ' checked=1'?>>
							전체 사이트 검색을 체크하면 '사이트 선택'의 값은 무시됩니다.
						</td>
					</tr>
					
					<tr valign='top'>
						<td width='120'>
							<span class='config-name'>사이트 선택</span>
						</td>
						<td>
							<input type='text' name='search_sites' value="<?=meta_get('search_sites')?>"> ( 콤마를 구분으로 여러 도메인 입력 가능 )
						</td>
					</tr>
					
				</table>
				
			</div>
			
		
				<input type='submit' value='업데이트' class='per-config-submit'>
				<div style='clear:right;'></div>
				
		</div>
	</div>
	