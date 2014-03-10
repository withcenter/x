<?php
	if ( $in['option'] == 'mb_edit' ) include_once 'config_member_edit.php';
	else {
		$rows = ms::members();
?>
	<table class='config-member-table' cellpadding=0 cellspacing=0 width='100%' border=1>
		<tr class='table-header' valign='top'>
			<td>번호</td>
			<td>아이디</td>
			<td>닉네임</td>
			<td>가입일</td>
			<td>탈퇴일</td>
			<td>차단일</td>
			<td>설정</td>
		</tr>
	<?php
		foreach ( $rows as $m ) {
		
	?>
		<tr>
			<td><?=$m['mb_no']?></td>
			<td><?=$m['mb_id']?></td>
			<td><?=$m['mb_nick']?></td>
			<td><?=$m['mb_open_date']?></td>
			<td>
				<?=$m['mb_leave_date']?$m['mb_leave_date'] : '활동중'?>
			</td>
			<td><?=$m['mb_intercept_date']?$m['mb_intercept_date'] : '활동중'?></td>
			<td><a href='<?=x::url()?>/?module=multisite&action=config_member&option=mb_edit&mb_id=<?=$m['mb_id']?>'>설정</a></td>
		</tr>
	<? }?>
	</table>
<? }?>