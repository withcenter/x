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
	<div class='middle-panel'>
	<?php if ($is_admin == 'super' || $is_auth) {  ?>
	<div class='admin-mode'>
		<div><a href="<?php echo G5_ADMIN_URL ?>">ADMIN PANEL</a></div>
		<div><a href="<?=x::url_admin()?>">X Admin Panel</a></div>
	</div>
	<?php }  ?>
	<div class='logout-button' <?if ($is_admin == 'super' || $is_auth) echo "style='float: right; width: 82px;'"?>>
		<a href="<?php echo G5_BBS_URL ?>/logout.php" <?if ($is_admin == 'super' || $is_auth) echo "style='padding: 0;'"?>>로그아웃</a>
	</div>
		<div style='clear: both'></div>
	</div>
	<div class='account-settings'>
		<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">
			<img src='<?=$outlogin_skin_url?>/setting.png'/> 회원정보변경
		</a>
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
