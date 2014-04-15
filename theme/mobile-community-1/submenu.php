<?/*?>
        <ul>
            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php" id="snb_new">1:1문의</a></li>
            <li class='visitor'><a href="<?php echo G5_BBS_URL ?>/current_connect.php" id="snb_cnt">접속자 <?php echo connect(); // 현재 접속자수 ?></a></li>
            <li class='new'><a href="<?php echo G5_BBS_URL ?>/new.php" id="snb_new">새글</a></li>
            <?php if ($is_member) { ?>
            <?php if ($is_admin) { ?>
            <li><a href="<?php echo G5_ADMIN_URL ?>" id="snb_adm"><b>관리자</b></a></li>
            <?php } ?>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank">
					<span class="sound_only">안 읽은 </span>쪽지
					<strong><?php echo g::memo_count_new(); ?></strong>
				</a>
				</li>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php" id="snb_modify">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php?url=<?=urlencode( '../x/theme/' . x::$config['site']['theme'] . '/content.php' )?>" id="snb_logout">로그아웃</a></li>
            <?php } else { ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php" id="snb_join">회원가입</a></li>
            <li><a href="javascript:void(0);" id="login-button">로그인</a></li>
            <?php } ?>
        </ul>
<?*/?>
<ul>
<?="<li class='menu-group'>" . implode( "</li><li class='menu-group'>", x::menu_links() ) . "</li>"?>

<?if( $member['mb_id'] ) {?>

	<li>		
		<a href="<?=G5_BBS_URL?>/member_confirm.php?url=register_form.php">내 프로필</a>
	</li>

	<? if ($is_admin == 'super') {  ?>
		<li>		
			<a href="<?=x::url_admin()?>">X ADMIN</a>		
		</li>
		
		<li>
			<a href="<?php echo G5_ADMIN_URL ?>">ADMIN</a>
		</li>
	<?}?>
	<li>
		<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" class='user-scrap'>스크랩</a>
	</li>
	<? if ( admin() ) {?>
	<li>
		<a href="<?=url_site_config()?>" class='user-win'>사이트 관리</a>
	</li>
	<? }
		else {?>	
	<li>
		<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class='user-win'>포인트</a> <?=$point?>
	</li>
	<? }
	
	}?>
</ul>
<style>
@media all and ( min-width: 640px ) {
	.menu-group {
		display: none;
		background-color: reed;
	}
}
</style>
