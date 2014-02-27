<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/theme.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/head.css' />
<script src='<?=x::url_theme()?>/js/theme.js' /></script>

<div class='layout'>
	<div class='top'>
		<div class='inner'>
			<div class='left'>
				<a href='<?=g::url()?>'>Home</a><span class="dot">•</span><a href='#'>Login</a><span class="dot">•</span><a href='#'>Profile</a><span class="dot">•</span><a href='#'>Community</a><span class="dot">•</span></span><a href='#'>QnA</a>
			</div>
			<div class='right'>
				<a href='#'>Cafe</a><span class="dot">•</span><a href='#'>앱 다운로드</a><span class="dot">•</span><a href='#'>Adv</a><span class="dot">•</span><a href='#'>Contact: +82 070 7529 1749</a>
			</div>
		</div>
	</div>
	<div class='header'>
		
	</div>


	<div class='body-wrapper'>
		<div class='main-content'>
			<div class='sidebar'>	
				<? include x::theme('sidebar'); ?>
			</div>
			<div class='content'>
				<?if (preg_match('/^config/', $action ) ) include ms::site_menu();?>
