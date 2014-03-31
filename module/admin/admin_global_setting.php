<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/admin/global_setting.css' />




<div class='admin-global-setting'>
<div class='page-title'>GLOBAL SETTING</div>

<form action='?'>
	<input type='hidden' name='module' value='admin'>
	<input type='hidden' name='action' value='admin_global_setting_submit'>
	<span class='sub-title'>Site CSS & JS Version</span><input type='text' name='site_css_js_version' value="<?=x::$config['global']['site_css_js_version']?>" size=4>

	<input type='submit' value='UPDATE'>
	<div style='clear:right;'></div>
</form>
</div>