

<div class='login-info'>

	<div class='nickname'><span class='nick'><?=my('nick')?></span>님</div>
	
	<table class='private' cellpadding='0' cellspacing='0' width='100%'>
		<tr>
			<td>
				<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                <span class="sound_only">안 읽은 </span>쪽지
                <strong><?php echo $memo_not_read ?></strong>
            </a>
			</td>
			<td>
            <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                포인트
                <strong><?php echo $point ?></strong>
            </a>
			</td>
			<td>			
            <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a>
			</td>
		</tr>
	</table>
	
	<table  class='bottom' cellpadding='0' cellspacing='0' width='100%'>
		<tr>
			<td>
				<div class='info'><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a></div>
			</td>
			<td>
				<div class='logout'><a href="<?=g::url()?>/bbs/logout.php">로그아웃</a></div>
			</td>
		</tr>
	</table>
	
</div>



<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
