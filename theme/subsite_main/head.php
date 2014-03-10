<script type='text/javascript' src='<?=x::url()?>/js/default.js'></script>
<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<!-- 상단 시작 { -->
<div id='website-wrapper'>

  <div id="hd-wrapper">
	<div id='menu-top'>
		<div class='inner'>
			<div id="logo">
				<a href="<?php echo G5_URL ?>">
					<img src='<?=x::url_theme()?>/img/logo1.png'>
				</a>
			</div>
			<?include x::theme('menu.top')?>
		</div>
	</div>
	
	<div id='search-wrapper'>
		<div class='inner'>
			<div class='sub-menu'>
				<?include x::theme('menu.main')?>
			</div>
			<div id='search-box'>
				<fieldset id="search-fieldset">
					<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
					<input type="hidden" name="sfl" value="wr_subject||wr_content">
					<input type="hidden" name="sop" value="and">
					<input type="text" name="stx" id="search_txtbox" maxlength="20" placeholder='Search'>
					<input type="image" id="search_submit" src="<?=x::url_theme()?>/img/search.png">
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
			</div>
		</div>
	</div>
</div>


<!-- 콘텐츠 시작 { -->

<div id="wrapper">
	<table cellpadding=0 cellspacing=0 width='100%'>
		<tr valign='top'>
			<td width='210' class='left-main'>
				<?php echo outlogin('x-outlogin-website.com'); // 외부 로그인  ?>
				<?php include 'user_site_list.php'; ?>
				<?php include "popular_forums.php"; ?>
				<?php include "new_sites.php"; ?>
			</td>
			<td>
				<div id="container">
				
					
					<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
