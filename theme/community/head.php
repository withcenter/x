<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<script src='<?=x::url_theme()?>/js/theme.js'></script>
<!-- 상단 시작 { -->
<? 
	if ( ms::meta('menu_5') ) {
		$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_5')."'");
	}
?>
<div id="header-container">
    <div id="travel-hd-wrapper">
		<div id="top-menu">
			<div class='inner'>
					<a href='<?=g::url()?>'>홈</a><a>&#8226;</a>
					<? if ( ms::meta('comheader_contact_number') ) {?>
						<a href='javascript:void(0);'>전화번호: <?=ms::meta('comheader_contact_number')?></a><a>&#8226;</a>
					<? }?>
					
					<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=ms::meta('menu_5')?>'><?=$row['bo_subject']?></a>
					<div class='customer-support'>
						<? if ( !login() ) { ?>
							<a href='<?=G5_BBS_URL?>/login.php'>로그인</a><a>&#8226;</a>
							<a href='<?=g::url()?>/<?=G5_BBS_DIR?>/register.php'>회원가입</a>
						<?} else {?>
							<a href='javascript:void(0)'><b><?=$member['mb_nick']?></b>님 반갑습니다.</a><a>&#8226;</a>
							<a href='<?=g::url()?>/<?=G5_BBS_DIR?>/logout.php'>로그아웃</a>
						<?}?>
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
						<input type="text" name="stx" id="search-input" placeholder='검색어를 입력해 주세요.'>
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

		
		