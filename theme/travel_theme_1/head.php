<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<!-- 상단 시작 { -->

<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <div id="travel-hd-wrapper">
		<div id="top-menu">
			<div class='inner'>
				<a href='#'>LOG IN</a>
				<a href='<?=G5_URL?>/<?=G5_BBS_DIR?>/register.php'>SIGN UP</a>
				<a href='#'>CUSTOMER SERVICE</a>
				<div class='customer-support'><img src='<?=x::url_theme()?>/img/phone.png'/>CUSTOMER SUPPORT: 123-45-67</div>
			</div>
		</div>
		
		<div id='logo-and-search'>
			<div class='inner'>
				<div id="logo">
					<a href="<?php echo G5_URL ?>">
					<?if( ms::meta('header_logo') ) { ?>
						<img src="<?=ms::meta('img_url').ms::meta('header_logo')?>">
					<?} else {?>
						<img src='<?=x::url_theme()?>/img/travel_sample_banner.png'>
					<?}?>
					</a>
				</div>
					<fieldset id="hd_sch">
						<legend>사이트 내 전체검색</legend>
						<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
						<input type="hidden" name="sfl" value="wr_subject||wr_content">
						<input type="hidden" name="sop" value="and">
						<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
						<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder='Quick Search'>
						<input type="submit" id="sch_submit" value="Go!">
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

    <hr>
	<?include x::theme('menu')?>
	
</div>
<!-- } 상단 끝 -->

<hr>
<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="aside">
        <?php echo outlogin('x-outlogin-travel-theme-1'); // 외부 로그인  ?>		        
		<?echo latest("x-latest-post-travel", ms::board_id(etc::domain()).'_2', 3, 20);?>
		<?echo latest("x-latest-post-travel-2", ms::board_id(etc::domain()).'_4', 3, 20);?>
    </div>
    <div id="container">
		<?if ( preg_match('/^config/', $action) ) include ms::site_menu();?>
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

		
		
		
		