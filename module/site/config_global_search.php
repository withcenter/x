 <div class='config-wrapper' style='margin-top: 10px;'>
	<div class='config-title'>
		<span class='config-title-info'>검색 설정</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_community_2_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	
	<div class='hidden-google-doc google_doc_community_2_1'>	
	</div>
	
	<div class='config-container'>
		<div style='margin-bottom: 10px;'><input type='checkbox' name='all_site_search' value=1 <?=meta('all_site_search')?"checked=1":''?> /> <span class='config-name'>전체 사이트 검색</span> &nbsp;&nbsp;&nbsp;체크하시면 검색될 사이트에 지정된 사이트에 관계없이 모든 사이트에서 검색 됩니다.</div>
		<div><span class='config-name' style='margin-right: 40px;'>검색될 사이트</span> <input type='text' name='site_search' value='<?=meta('site_search')?>' style='padding: 3px 10px; width: 200px;'/> &nbsp;&nbsp;&nbsp;사이트는 콤마(,)로 구분해서 작성해 주세요.</div>
	</div>
	
		<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>