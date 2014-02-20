<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">

<!-- 상단 시작 { -->
<div id="header-container">
    <div id="travel-hd-wrapper">
		<div id="top-menu"  style="background: url('<?=x::url_theme()?>/img/top-menu-bg.png')">
			<div class='inner'>
				<a href='#'>
					<a href='#'>CALL: 123-4567</a><a>&#8226;</a>
					<a href='#'>EMAIL</a><a>&#8226;</a>
					<a href='#'>FAQS</a>
					<div class='customer-support'>
						<a href='#'>LOG IN</a><a>&#8226;</a>
						<a href='<?=G5_URL?>/<?=G5_BBS_DIR?>/register.php'>SIGN UP</a>
					</div>
			</div>
		</div>
		
		<div id='logo-and-search'>
			<div class='inner'>
				<div id="header-logo">
					<a href="<?php echo G5_URL ?>">
					<?if( ms::meta('header_logo') ) { ?>
						<img src="<?=ms::meta('img_url').ms::meta('header_logo')?>">
					<?} else {?>
						<img src='<?=x::url_theme()?>/img/community_sample_banner.png'>
					<?}?>
					</a>
				</div>
				<div id='header-search'>
					<fieldset>
						<legend>사이트 내 전체검색</legend>
						<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
						<input type="hidden" name="sfl" value="wr_subject||wr_content">
						<input type="hidden" name="sop" value="and">
						<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
						<input type="text" name="stx" id="search-input" placeholder='Search'>
						<input type="submit" id="search-submit" value='' style="background: url('<?=x::url_theme()?>/img/search.png') no-repeat">
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

    <hr>
	<?include x::theme('menu')?>
	
</div>
<!-- } 상단 끝 -->

<hr>
<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="aside">
		<?include x::theme('sidebar')?>
    </div>
    <div id="container">
		<?if ( preg_match('/^config/', $action) ) include ms::site_menu();?>
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

		
		