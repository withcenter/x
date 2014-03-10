<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
 
<!-- 로그인 후 아웃로그인 시작 { -->
<link rel="stylesheet" href="<?php echo $outlogin_skin_url ?>/style.css">
<div class='login-box logged-in'><div class='inner'>
	<div class='logged-in-name'>
		[<?=$nick?>]님 로그인
	</div>
	<div class='logged-in-messages'>
		<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank">
			<img src='<?=$outlogin_skin_url?>/message2.png'/> 쪽지 확인
		</a>
	</div>
	<div class='logged-in-change-password'>
		<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">
			<img src='<?=$outlogin_skin_url?>/lock2.png'/> 비밀번호 변경
		</a>
	</div>
	<div class='logout-button'>
		<a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a>
	</div>
	<div class='account-settings'>
		<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">
			<img src='<?=$outlogin_skin_url?>/setting.png'/> 회원정보변경
		</a>
	</div>
<!--		<div class='login-box-info'>
			<?php if ($is_admin == 'super' || $is_auth) {  ?>
				<div class='admin-mode'><a href="<?php echo G5_ADMIN_URL ?>">ADMIN PANEL</a></div>
				<div class='admin-mode'><a href="<?=x::url_admin()?>">X Admin Panel</a></div>
			<?php }  ?>
			<div class='username'><?php echo $nick ?><?=lang(' is logged in', '님 로그인')?></div>
			
			<div class='setting'>
				<img src='<?=$outlogin_skin_url?>/message.png' />
				<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">쪽지
					<span style='border-radius: 30%; padding: 0 0.5em; font-size: 11px; color: #000000; background-color: #ffffff;' class='message_new'><?=$memo_not_read ?></span>
				</a>
			</div>
			
			<div class='profile'>
				<img src='<?=$outlogin_skin_url?>/lock.png' />
				<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a>
			</div>
			
			<span class='logout-button'>
			<a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a></span>
		</div> -->
		
</div></div>


<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
