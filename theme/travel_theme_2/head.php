<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/banner.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/index.css' />
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/tail.css' />
<script src='<?=x::url_theme()?>/js/floating-bar.js'></script>

<!-- 상단 시작 { -->
<?php
	include 'top.php';
?>
<div class="travel_theme2_header">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="header_wrapper">
			<div id="header-logo">
					<a href="<?php echo G5_URL ?>">
					<?if( ms::meta('header_logo') ) { ?>
						<img src="<?=ms::meta('img_url').ms::meta('header_logo')?>">
					<?} else {?>
						<img src='<?=x::url_theme()?>/img/default-logo.png'>
					<?}?>
					</a>
				</div>
				
				
			<div class='search-bar'>
	  <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
		<input type="hidden" name="sfl" value="wr_subject||wr_content">
		<input type="hidden" name="sop" value="and">
		<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder='검색' />
		<input type="image" id="sch_submit" src='<?=x::url_theme()?>/img/search-icon.png' />
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
	</div>
	<div style='clear:both;'></div>
        </div>
	<?php include 'menu.php';?>
	<div style='clear: both'>
    </div>


</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->

<div>
<div class="layout"><div class='inner'>

<div class='floating-bar'>
	<div class='float-image-wrapper'>
	<?
	for( $i = 1; $i <= 3; $i++ ){
		if ( ms::meta('travel2banner'.$i.'_floating') ) {
			$img = "<a href='".ms::meta('travel2banner'.$i.'_floating_text'.$i)."'><img src='".ms::meta('img_url').ms::meta('travel2banner'.$i.'_floating')."'/></a>";	
		}
		else $img = null;
		
		if( $i == 3 ) $no_margin = 'no-margin';
	?>
		<div class='float-image <?=$no_margin?>'><?=$img?></div>
<?}?>
	
	</div>
<div class='back-to-top'><img src='<?=x::url_theme()?>/img/up-arrow.png'/><br>TOP</div>
</div>
    <div class="left">
		<div class='login-sidebar'>
			<?php echo outlogin('x-outlogin-travel_3'); // 외부 로그인  ?>
		</div> 
		<?php include x::theme('sidebar_left') ?>
    </div>
    <div class="container">
		<?if ( (preg_match('/^config/', $action)) || (preg_match('/^config_/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
