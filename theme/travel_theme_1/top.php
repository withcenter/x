<?php
	$links = x::menu_links('left' );
	$links ? $last = '' : $last = " class='last'";
?>
<div class='travel-theme-top-wrapper'><div class='inner'>
	<div  id="menu-top-left"><div class='inner'>
		<ul>
			<li class='first-item' ><div class='inner'><a href='<?=g::url()?>'>홈</a></div></li>
			<? if ( $member['mb_id'] ) {?>
				<li><div class='inner'><a href='<?=G5_BBS_URL?>/logout.php'>로그아웃</a></div></li>
				<li<?=$last?>><div class='inner'><a href='<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php'>회원정보수정</a></div></li>
			<? } 
				else {?>
					<li><div class='inner'><a href='<?=G5_BBS_URL?>/login.php'>로그인</a></div></li>
					<li<?=$last?>><div class='inner'><a href='<?=G5_BBS_URL?>/register.php'>회원가입</a></div></li>
				<?}?>

				<?php
					$i_cnt = 0;
					foreach( $links as $link ) {
						$i_cnt ++;
						if ( $i_cnt == count($links) ) $last = " class='last'";
						echo "<li$last><div class='inner'>$link</div></li>";
					}
				?>
		
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div  id="menu-top-right"><div class='inner'>
		<ul>
			<?//="<li><div class='inner'>".implode("</div></li>", x::menu_links('right'))."</div></li>"?>
			<?php
				 foreach( x::menu_links('right' ) as $link ) {
					echo "<li>$link</li>";
				 }
			?>
			<li><a href='<?=url_language_setting()?>'><?=lang("Change Language")?></a></li>
			<li class='last'><a href='<?=g::url()?>?device=mobile'><?=lang("Mobile View")?></a></li>
		</ul>
		<div style='clear:left;'></div>
	</div></div>
	<div style='clear: both'></div>
</div></div>

