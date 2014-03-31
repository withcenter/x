
	<div class='config-main-container'>

		<div class='config-wrapper'>						
			<div class='config-title'>
				<span class='config-title-info'>회원 가입 약관 및 개인 정보 처리 방침 안내</span>
				<span class='config-title-notice'>
					<span class='user-google-guide-button' page = 'google_doc_global' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
					<img src='<?=module('img/setting_2.png')?>'>
				</span>
			</div>
			
			<div class='config-container'>

			<div class='hidden-google-doc google_doc_global'></div>
				<div class='sub-title'>만약 빈 칸으로 해 놓으면 가입 약관 페이지를 보여주지 않습니다.</div>
			
				<table cellpadding='0' cellspacing='0' width='100%'>
					<tr valign='top'>
						<td width='120'>
							<span class='config-name'>회원 가입 약관</span>
						</td>
						<td>
							<textarea name="user_agreement"><?=meta('user_agreement')?></textarea>
						</td>
					</tr>
					<tr valign='top'>
						<td width='120'>
							<span class='config-name'>개인 정보 처리<br />방침 안내</span>
						</td>
						<td>
							<textarea name="user_information_agreement"><?=meta('user_information_agreement')?></textarea>
						</td>
					</tr>
				</table>
				
			</div>
			
		
				<input type='submit' value='업데이트' class='per-config-submit'>
				<div style='clear:right;'></div>
				
		</div>
	</div>
	