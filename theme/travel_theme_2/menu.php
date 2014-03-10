<div class='main-menu-wrapper'>
<div class='main-menu'>
<ul>
	<li class='first-item home'><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
	<?php
	if( ms::admin() ){
		$max_menus = 5;
	}
	else {
		$max_menus = 6;		
	}
		for ( $i=1; $i <=$max_menus; $i++ ) {
			if ( $board_id = ms::meta('menu_'.$i) ) {
				$menu_name = ms::meta("menu_name_$i");
				if ( empty($menu_name) ) {
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
					if ( empty($row['bo_subject']) ) $menu_name = ln("No Subject", "제목없음");
					else $menu_name = $row['bo_subject'];
				}
				?>
					<li page='<?=ms::meta('menu_'.$i)?>'>
						<div class='inner'>
							<a  href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$board_id?>'>
								<?=$menu_name?>
								<div class='border_left'></div>
							</a>
						</div>
					</li>
				<?
			}
		}
	?>
	<?if ( ms::admin() ) { ?><li class='last-item' page='admin-menu'><div class='inner'><a  href='<?=ms::url_config()?>'>사이트 관리<div class='border_left'></div></a></div></li><?}?>
</ul>
<div class='search-bar'>
	  <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
		<input type="hidden" name="sfl" value="wr_subject||wr_content">
		<input type="hidden" name="sop" value="and">
		<input type="text" name="stx" id="travel_search_text" maxlength="20" placeholder='검색어를 입력해 주세요.' />
		<input type="image" id="travel_search_submit" src='<?=x::url_theme()?>/img/search.png' />
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
</div>
<div style='clear:both;'></div>
</div>
<script>
	$(function(){				
		if( '<?=$in['bo_table']?>' != '' ) $(".main-menu li[page='<?=$in['bo_table']?>']").addClass("selected");
		else if( '<?=$in['module']?>' ) $(".main-menu li[page='admin-menu']").addClass("selected");
		else $(".main-menu .home").addClass("selected");
	});
</script>