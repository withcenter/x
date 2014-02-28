<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/theme.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/head.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/tail.css' />
<div class='layout'>
	<div class='top'>
		<div class='inner'>
			<? if ( $member['mb_id'] ) {
				$do_log = "<a href='".G5_BBS_URL."/logout.php'>Log Out</a>";
				$profile = "<a href='".G5_BBS_URL."/member_confirm.php?url=register_form.php'>Profile</a>";
			} 
				else {
				$do_log = "<a href='".G5_BBS_URL."/login.php'>Log In</a>";
				$profile = "<a href='".G5_URL."/".G5_BBS_DIR."/register.php'>Register</a>";
			}?>
			<div class='left'>
				<a href='<?=g::url()?>'>Home</a><span class="dot">•</span><?=$do_log?><span class="dot">•</span><?=$profile?><span class="dot">•</span><a href='#'>Community</a><span class="dot">•</span></span><a href='#'>QnA</a>
			</div>
			<div class='right'>
				<a href='#'>Cafe</a><span class="dot">•</span><a href='#'>앱 다운로드</a><span class="dot">•</span><a href='#'>Adv</a><span class="dot">•</span><a href='#'>Contact: +82 070 7529 1749</a>
			</div>
		</div>
	</div>
	<div class='header'>
	<table width='100%' cellpadding=0 cellspacing=0><tr valign='top'>
		<td width=230>
			<div id="comm3_logo">
				<a href="<?php echo G5_URL ?>">
				<?if( ms::meta('header_logo') ) { ?>
					<img src="<?=ms::meta('img_url').ms::meta('header_logo')?>">
				<?} else {?>
					<img src='<?=x::url_theme()?>/img/banner.png'>
				<?}?>
				</a>
			</div>
		</td>
		<td>
			<fieldset id="search_field">
				<legend>사이트 내 전체검색</legend>
				<form name="comm3_search_form" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
					<table id='search_table_holder' cellpadding=0 cellspacing=0><tr>
						<td>
							<input type="text" name="stx" id="comm3_search_text" maxlength="20" placeholder='Search' autocomplete='off'>
						</td>
						<td width=40>				
							<input type="image" src="<?=x::url_theme()?>/img/search.png" id="comm3_search_submit">
						</td>
					</tr></table>
				</form>

				<script>
				function fsearchbox_submit(f)
				{
					if (f.stx.value.length < 2) {
						alert("검색어는 두글자 이상 입력하십시오.");
						f.stx.select();
						f.stx.focus();
						return false;
					}

					// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
					var cnt = 0;
					for (var i=0; i<f.stx.value.length; i++) {
						if (f.stx.value.charAt(i) == ' ')
							cnt++;
					}

					if (cnt > 1) {
						alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
						f.stx.select();
						f.stx.focus();
						return false;
					}

					return true;
				}
				</script>
			</fieldset>
		<td>		
		</tr></table>
	</div>
	<div class='main-menu'>	
			<?include x::theme('main-menu')?>				
	</div>	

	<div class='body-wrapper'>
		<div class='main-content'>
			<div class='sidebar'>	
				<? include x::theme('sidebar'); ?>
			</div>
			<div class='content'>
				<?if (preg_match('/^config/', $action ) ) include ms::site_menu();?>
