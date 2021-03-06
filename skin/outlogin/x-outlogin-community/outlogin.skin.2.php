<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 로그인 후 아웃로그인 시작 { -->
<link rel="stylesheet" href="<?php echo $outlogin_skin_url ?>/style.css">
<div class='login-box'><div class='inner'>
		<div class='login-box-info'>
			<?php if ($is_admin == 'super' || $is_auth) {  ?>
				<div class='admin-mode'><a href="<?php echo G5_ADMIN_URL ?>">ADMIN PANEL</a></div>
				<div class='admin-mode'><a href="<?=x::url_admin()?>">X Admin Panel</a></div>
			<?php }  ?>
			<div class='username'><?php echo $nick ?><?=lang(' is logged in', '님 로그인')?></div>
			
			<div class='setting'>
				<img src='<?=$outlogin_skin_url?>/message.gif' style='position: relative; top: -3px;' />
				<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">쪽지
					<span style='display: inline-block; border-radius: 50%; border: 1px solid #d5d5d5; padding: 0 4px; font-size: 11px; color: #ffffff; background-color: #7b6456; position: relative; top: -1px' class='message_new'><?=$memo_not_read ?></span>
				</a>
			</div>
			
			<div class='profile'>
				<img style='position: relative; top: -3px;' src='<?=$outlogin_skin_url?>/lock.gif' />
				<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a>
			</div>
			
			<span class='logout-button'>
			<a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a></span>
		</div>
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
