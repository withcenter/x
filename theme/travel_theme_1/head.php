<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<script src='<?=x::url_theme()?>/js/theme.js'></script> 
<!-- 상단 시작 { -->
<div id="travel-theme-1-hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <div id="travel-hd-wrapper">
		<div id="top-menu">
			<div class='inner'>
				<span class ='top-menu-item login'><a href='#'>LOG IN</a></span>
				<div id ='pop-up-login'><?php echo outlogin('x-outlogin-travel-pop-up');?></div>
				<span class ='top-menu-item register'><a href='<?=G5_URL?>/<?=G5_BBS_DIR?>/register.php'>SIGN UP</a></span>
				<span class ='top-menu-item customer-service'><a href='#'>CUSTOMER SERVICE</a></span>
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
        
		<?
			$latest_bo_table = ms::board_id(etc::domain()).'_1';
			if ( g::forum_exist($latest_bo_table) ) echo latest("x-latest-post-travel", $latest_bo_table, 3, 20);
			else echo "<div class='notice'>NO POST AVAILABLE FOR WRITE TABLE ".$latest_bo_table."</div>";
			
			$latest_bo_table = ms::board_id(etc::domain()).'_2';
			if ( g::forum_exist($latest_bo_table) ) echo latest("x-latest-post-travel-2", $latest_bo_table, 3, 20);
			else echo "<div class='notice'>NO POST AVAILABLE FOR WRITE TABLE ".$latest_bo_table."</div>";
			
			
		/*?>

	<div class='sidebar-thumb'>
		<div class='thumb-container'>
			<?php 
				$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
				$current_date = date('Y-m-d').' 23:59:59';
				$previous_date = date('Y-m-d', strtotime("-7 day", strtotime($current_date))).' 00:00:00';
				$rows = db::rows( "SELECT bo_table, wr_id FROM $g5[board_new_table] WHERE $qb AND bn_datetime BETWEEN '$previous_date' AND '$current_date' ORDER BY bn_datetime DESC" );	
				if( !empty( $rows ) ) {
					foreach ( $rows as $row ) {	
						$board['bo_table'] = $row['bo_table'];
						$images[] = get_file($board['bo_table'],$row['wr_id']);
					}
					
					$count = 1;				
					foreach ( $images as $image ) {
						foreach ( $image as $key => $value ) {
							if ( $count <= 9 ) {
								if( $count % 3 == 0 ) $nomargin = 'no-margin';
								else $nomargin = '';
								if( $count >= 7 ) $nomargin_bottom = 'no-margin-bottom';								
								if( $value['view'] ) {
									$img = get_view_thumbnail($value['view'], 94);
									$img_thumbnail = "<div class='sidebar-img-wrapper $nomargin $nomargin_bottom'>".$img."</div>";																		
									echo $img_thumbnail;
									$count++;
								}
							}
						}
					}
				}
			?>
		</div>
		</div>	
		<?*/?>
    </div>
    <div id="container">
		<?if ( preg_match('/^config/', $action) ) include ms::site_menu();?>
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

		
		