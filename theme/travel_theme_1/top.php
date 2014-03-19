<div class='travel-theme-top-wrapper'><div class='inner'>
	<div  id="menu-top-left"><div class='inner'>
		<ul>
			<li class='first-item' ><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
			<? if ( $member['mb_id'] ) {?>
				<li><div class='inner'><a href='<?=G5_BBS_URL?>/logout.php'>로그아웃</a></div></li>
				<li><div class='inner'><a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'>회원정보수정</a></div></li>
			<? } 
				else {?>
					<li><div class='inner'><a href='<?=G5_BBS_URL?>/login.php'>로그인</a></div></li>
					<li><div class='inner'><a href='<?=G5_BBS_URL?>/register.php'>회원가입</a></div></li>
				<?}?>

			<? for ( $i = 1; $i <= 3; $i++ ) {
					if ( x::meta('forum_no_'.$i.'_name') ) {
						$top_menu = x::meta('forum_no_'.$i.'_name');				
					  }
					  else {
						$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".x::meta('forum_no_'.$i)."'");
						$top_menu = $row['bo_subject'];						
					  }
				if( $top_menu ){?>
					<li><div class='inner'><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=x::meta('forum_no_'.$i)?>'><?=$top_menu?></a></div></li>
				<?}
				
				}
			?>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div  id="menu-top-right"><div class='inner'>
		<ul>
			<? for ( $i = 4; $i <= 5; $i++ ) {
					if ( x::meta('forum_no_'.$i.'_name') ) {
						$top_menu = x::meta('forum_no_'.$i.'_name');				
					  }
					  else {
						$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".x::meta('forum_no_'.$i)."'");
						$top_menu = $row['bo_subject'];
					  }
			if( $top_menu ){?>
				<li  <?if($i==4) echo "class='first-item'"?>><div class='inner'><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=x::meta('forum_no_'.$i)?>'><?=$top_menu?></a></div></li>
			<?}
			
			}?>
			<li><a href='<?=g::url()?>?device=mobile'>모바일</a></li>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div style='clear: both'></div>
</div></div>