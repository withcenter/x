<div class='travel-theme-top-wrapper'><div class='inner'>
	<div  id="menu-top-left"><div class='inner'>
		<ul>
			<? for ( $i = 1; $i <= 3; $i++ ) { ?>
			<? if ( ms::meta('menu_'.$i) ) { 
				$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
				if ( !$menu = $row['bo_subject'] ) $menu = null;
			?>
				<li  <?if($i==3) echo "class='last-menu'"?>><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><div class='inner'><?=$menu?></div></a></li>
			<?}}?>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div  id="menu-top-right"><div class='inner'>
		<ul>
			<? for ( $i = 4; $i <= 7; $i++ ) { ?>
			<? if ( ms::meta('menu_'.$i) ) { 
				$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
				if ( !$menu = $row['bo_subject'] ) $menu = null;
			?>
				<li  <?if($i==7) echo "class='last-menu'"?>><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><div class='inner'><?=$menu?></div></a></li>
			<?}}?>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
<!--	<div class='search-bar'>
	  <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
		<input type="hidden" name="sfl" value="wr_subject||wr_content">
		<input type="hidden" name="sop" value="and">
		<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder='검색' />
		<input type="image" id="sch_submit" src='<?=x::url_theme()?>/img/search_button.gif' />
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
	<div style='clear:right;'></div>
-->
	<div style='clear: both'></div>
</div></div>