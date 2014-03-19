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

				<?php
				 foreach( x::menu_links('left' ) as $link ) {
					echo "<li><div class='inner'>$link</div></li>";
				 }
				?>
		
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div  id="menu-top-right"><div class='inner'>
		<ul>
			<?php
				 foreach( x::menu_links('right' ) as $link ) {
					echo "<li><div class='inner'>$link</div></li>";
				 }
			?>
			<li><a href='<?=g::url()?>?device=mobile'>모바일</a></li>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div style='clear: both'></div>
</div></div>