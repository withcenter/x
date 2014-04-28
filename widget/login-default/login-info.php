<div class='login-info'>

	<div class='nickname'><span class='nick'><b><?=my('nick')?></span> is logged in</b></div>
	<div class='login-divider'></div>
		<div class='top_info'> 최고관리자님 </div>
	<div class='login-divider'></div>
	<div class='login-menus'>
		<div class='menu'><a href="<?=url_bbs()?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">쪽지<strong><?php echo $memo_not_read ?></strong></div>
		<div class='menu'><a href="<?=url_bbs()?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a></div>
		<div class='menu'><a href="<?=url_bbs()?>/point.php" target="_blank" id="ol_after_pt" class="win_point">포인트<strong><?php echo $point ?></strong></div>
		<div class='menu'><a href="<?=url_bbs()?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a></div>
		<div style='clear: left'></div>
	</div>
	<div class='logout'><div class='inner'><a href="<?=g::url()?>/bbs/logout.php">로그아웃</a></div></div>
	<!--<table class='private' cellpadding='0' cellspacing='0' width='100%'>
		<tr>
			<td>
				<a href="<?=url_bbs()?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                <span class="sound_only">안 읽은 </span>쪽지
                <strong><?php echo $memo_not_read ?></strong>
            </a>
			</td>
			<td>
            <a href="<?=url_bbs()?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                포인트
                <strong><?php echo $point ?></strong>
            </a>
			</td>
			<td>			
            <a href="<?=url_bbs()?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a>
			</td>
		</tr>
	</table>
	
	<table  class='bottom' cellpadding='0' cellspacing='0' width='100%'>
		<tr>
			<td>
				<div class='info'><a href="<?=url_bbs()?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a></div>
			</td>
			<td>
				<div class='logout'><a href="<?=g::url()?>/bbs/logout.php">로그아웃</a></div>
			</td>
		</tr>
	</table>
	-->
</div>



<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?=url_bbs()?>/member_confirm.php?url=member_leave.php";
}
</script>
