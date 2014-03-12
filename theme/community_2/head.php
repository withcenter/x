<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/theme.css' />
<script src='<?=x::url_theme()?>/js/theme.js' /></script>
<?php
	$path = x::theme('top');
	include $path;
	$image_dir = x::url_theme().'/img';
?>
<div class='logo_search'>
	<div class='inner'>
		<a href='<?=g::url()?>'>
			<?if( file_exists( path_logo() ) ) { ?>
					<img src="<?=url_logo()?>">
			<?} else {?>
				<img src="<?=x::url_theme()?>/img/banner.png" />	
			<?}?>
		</a>
		
		<div class='search-bar'>
			<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" autocomplete='off'>
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<div class='wrapper'><div class='s_inner'><div class='s_inner_inner'>
					<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder='검색어를 입력해 주세요.' value='<?=$in['stx']?>' />
					<input type="image" src='<?=$image_dir?>/submit_button.png'>  
				</div></div></div>
            </form>
		</div>
		
		<div style='clear:right;'></div>
	</div>
</div>
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
<div class='main-menu'><div class='inner'>
	<? for ( $i = 1; $i <= 6; $i++ ) { ?>
	<? if ( ms::meta('menu_'.$i) ) { 
		/*
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
		*/
			$menu_name = ms::meta("menu_name_$i");
			if ( empty($menu_name) ) {
				$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
				if ( empty($row['bo_subject']) ) $menu_name = ln("No Subject", "제목없음");
				else $menu_name = $row['bo_subject'];
			}
	?>
		<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu_name?></a>
	<?}}?>
	<? if ( admin() ) { ?>
		<a href="<?=url_site_config()?>">사이트 관리</a>
	<? } ?>
</div></div> 

<div class='layout'>
	<div class='main-content'>
			<div class='left'>	
				<? include x::theme('left') ?>				
			</div><!--left-->
			<div class='content'>
				<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>