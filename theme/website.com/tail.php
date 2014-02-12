</div>
<div style='clear:both;'></div>
	<div id='footer'>
	<? /*
		<div id='bottom-menus'>
		<a class='home' href='/' class="menu-list">홈</a></li>
		<?php if ( $is_admin == 'super' || ms::admin()) { ?>
			<a href="<?=x::url()?>/?module=admin&action=index" class="admin">어드민 패널</a>		
		<? } ?>
		<? for ( $i = 1; $i <= 10; $i++ ) { ?>	
		<? if ( $extra['menu_'.$i] != '' ) {
			$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '".$extra['menu_'.$i]."'");
		
			if ( $extra['submenu_'.$i] ) $menu_id = "menu=$i";
			else $menu_id = null;		
		?>
			<a class='<?php echo $extra['menu_'.$i]?>' href='<?=g::url()?>/bbs/board.php?bo_table=<?=$extra['menu_'.$i]?>' class="menu-list"><?=strtoupper($option['bo_subject'])?></a>			
		<?}} ?>
		
		<a href="http://wwww.philgo.com" class="main-site">필고</a>
		</div>
		*/?>
			<b>상호</b> 위세너 <b>대표자</b> 송재호 <b>대표전화</b>070-7529-1749 <b>이메일</b>philgohelp@gmail.com<br />
			<b>사업자등록번호</b> 106-02-98669 <b>통신판매신고번호</b> 2008-경남김해-0098<br />
			<b>주소</b> 경상남도 김해시 한림면 신천리 284 <b>개인정보관리책임자</b> 송재호<br />
	</div>
</div>
</div>