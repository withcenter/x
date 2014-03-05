<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 로그인 후 아웃로그인 시작 { -->
<link rel="stylesheet" href="<?php echo $outlogin_skin_url ?>/style.css">

<div class='login-box logout-community3'>
	<table cellpadding=0 cellspacing=0 width=190>
		<tr>
			<td>
				<div class='my_profile'>내 프로필 </div>
			</td>
			<td align='right'>
				<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보 수정</a>
			</td>
		</tr>
	</table>

		<div class='user-info'><b><?php echo $nick ?></b>님 로그인&nbsp;&nbsp;&nbsp;	
			<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">쪽지<span class='no_of_unreaded_message'><?php echo $memo_not_read ?></span>
			</a>
		</div>
			
		<div class='point-scrap'>
			<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
			   포인트 <?php echo $point ?>
			</a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a>
		</div>
		
		
		<?php if ($is_admin == 'super' || $is_auth) {  ?>
		<div class='admin-mode'><a href="<?php echo G5_ADMIN_URL ?>">ADMIN</a> <a href="<?=x::url_admin()?>">X ADMIN</a></div>
		
		<?php }  ?>
		
		<a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout" class='logout-button'>로그아웃</a>
</div> 

<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
