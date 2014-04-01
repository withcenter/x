<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 로그인 후 아웃로그인 시작 { -->
<link rel="stylesheet" href="<?php echo $outlogin_skin_url ?>/style.css">

<div class='login-box-gallery-mobile logout-box-gallery-mobile'>
<div class='logout-inner'>
	<table width='100%' cellpadding=0 cellspacing=0><tr valign='top'>
	<td>
		<div class='user-info'>
		<? if ( super_admin() ) {  ?>
				<div class='top'>
					<div class='left'>
						<div><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">내 프로필</a></div>
					</div>
					<div class='right'>
						<?if ( admin() ){?>
						<div><a class='info text' href='<?=x::url_admin()?>'>X-ADMIN</a></div>
						<? if ( super_admin() ) {?>
						<div><a class='info text' href='<?=g::url()?>/adm'>ADMIN</a></div>
						<? }?>						
					<?}?>					
					</div>
					<div style='clear;both'></div>
				</div>
		<? }?>
			
			<div class='user-meta'>
				<span class='user-icon-points'>
					<span class='user-message'>
						<img src='<?=$outlogin_skin_url?>/msg-icon.png'/>
						<?
						if( !$memo_not_read ) $no_msgs = 'no-msg';
						?>
						<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class='user_memo'>쪽지 <span class='memo-not-read <?=$no_msgs?>'>[<?=$memo_not_read?>] </span></a>
				
					</span>
					<br>
					<span class='user-points'>
						<img src='<?=$outlogin_skin_url?>/star.png'/>
						<? if ( admin() ) {?>
							<a href="<?=url_site_config()?>" class='user-win'>사이트 관리</a>
						<? }
							else {?>	
								<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class='user-win'>포인트</a> <?=$point?>
						<? }?>
					</span>
				</span>
				
			</div>
			</div>
	</td>
	<td class='logout-btn-td'>
		<div class='log_out'>
			<a href="<?php echo G5_BBS_URL ?>/logout.php"><img src='<?=$outlogin_skin_url?>/signout_button.png'/></a>
		</div>
	</td>
	</tr></table>
	<div class='user-logged-name'><?=$nick?> IS LOGGED IN</div>
</div>
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
