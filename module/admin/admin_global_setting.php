<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/admin/global_setting.css' />




<div class='admin-global-setting'>
<div class='page-title'>GLOBAL SETTING</div>

<form action='?'>
	<input type='hidden' name='module' value='admin'>
	<input type='hidden' name='action' value='admin_global_setting_submit'>
	
	
	
	
	
	
	
	<div>
		<span class='sub-title'>Site CSS & JS Version</span><input type='text' name='site_css_js_version' value="<?=x::$config['global']['site_css_js_version']?>" size=4>
	</div>
	
	
	<div>
		<span class='sub-title'>관리자에게 새글 쪽지 알림</span>
		<input type='checkbox' name='memo_new_post_to_admin' value="Y" <? if ( x::$config['global']['memo_new_post_to_admin'] == 'Y' ) echo "checked=1"; ?>>
		예, 새글(덧글 포함)을 관리자에게 쪽지로 알립니다.
	</div>
	
	
	<div>
		<span class='sub-title'>회원에게 덧글 쪽지 알림</span>
		<input type='checkbox' name='memo_new_post_to_member' value="Y" <? if ( x::$config['global']['memo_new_post_to_member'] == 'Y' ) echo "checked=1"; ?>>
		예, 덧글(덧글의 덧글 포함)을 회원에게 쪽지로 알립니다.
	</div>
	
	
	

	<input type='submit' value='UPDATE'>
	<div style='clear:right;'></div>
</form>
</div>