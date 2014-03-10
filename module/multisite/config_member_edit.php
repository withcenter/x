<?php
if ( $in['done'] ) {
	$up = array();
	if ( $mb_password ) $in['mb_password'] = sql_password($mb_password);
	else unset($in['mb_password'] );
	
	
	// 차단 
	if ( $block ) {
		$in['mb_intercept_date'] = date("Ymd", G5_SERVER_TIME);
	}
	
	if ( $unblock ) {
		$in['mb_intercept_date'] = '';
	}
	
	// 탈퇴 
	if ( $leave ) {
		$in['mb_leave_date'] = date("Ymd", G5_SERVER_TIME);
	}
	
	if ( $unleave ) {
		$in['mb_leave_date'] = '';
	}
	
	unset($in['block']);
	unset($in['unblock']);
	unset($in['leave']);
	unset($in['unleave']);
	
	foreach ( $in as $key => $value ) {
		if ( $key == 'module' || $key == 'done' || $key == 'action' || $key == 'mb_id' || $key == 'option' ) continue;
		$up[$key] = mysql_real_escape_string($value);
	}
	$result = db::update($g5['member_table'], $up, array('mb_id'=>$mb_id));
	
	if ( $result ) echo "<div class='message'>수정 되었습니다.</div>";
}


$minfo = db::row("SELECT * FROM ".$g5['member_table']." WHERE mb_id='$mb_id'");
?>
<form method='get'>
	<div class='member-info-edit'>
		<input type='hidden' name='module' value='multisite' />
		<input type='hidden' name='action' value='config_member' />
		<input type='hidden' name='option' value='mb_edit' />
		<input type='hidden' name='mb_id' value='<?=$mb_id?>' />
		<input type='hidden' name='done' value=1 />
		<div>
			<div class='basic-info'>
				<div><span class='sub-title'>아이디</span> <?=$minfo['mb_id']?></div>
				<div><span class='sub-title'>가입일</span> <?=$minfo['mb_open_date']?></div>
				<div><span class='sub-title'>마지막 로그인 날짜</span> <?=$minfo['mb_today_login']?></div>
				<div><span class='sub-title'>로그인 아이피</span> <?=$minfo['mb_login_ip']?></div>
			</div>
			<div class='member-info-edit'>회원정보 수정</div>
			<div class='member-info-content-edit'>
				<div><span class='sub-title'>이름</span> <input type='text' name='mb_name' value='<?=$minfo['mb_name']?>' /></div>
				
				<div><span class='sub-title'>닉네임</span> <input type='text' name='mb_nick' value='<?=$minfo['mb_nick']?>' /></div>
				<div><span class='sub-title'>이메일</span> <input type='text' name='mb_email' value='<?=$minfo['mb_email']?>' /></div>
				<div><span class='sub-title'>홈페이지</span> <input type='text' name='mb_homepage' value='<?=$minfo['mb_homepage']?>' /></div>
				
				<div><span class='sub-title'>성별</span> <input type='text' name='mb_sex' value='<?=$minfo['mb_sex']?>' /></div>
				
				
				<div><span class='sub-title'>유선전화</span> <input type='text' name='mb_tel' value='<?=$minfo['mb_tel']?>' /></div>
				
				<div><span class='sub-title'>휴대전화</span> <input type='text' name='mb_hp' value='<?=$minfo['mb_hp']?>' /></div>
				
				<div>
					<span class='sub-title'>우편번호</span> 
					<input type='text' name='mb_zip1' value='<?=$minfo['mb_zip1']?>' /> - <input type='text' name='mb_zip2' value='<?=$minfo['mb_zip2']?>' />
				</div>
				<div>
					<span class='sub-title'>주소</span> 
					<input type='text' name='mb_addr1' value='<?=$minfo['mb_addr1']?>' /> <input type='text' name='mb_addr2' value='<?=$minfo['mb_addr2']?>' />
					<div><input type='text' name='mb_addr3' value='<?=$minfo['mb_addr3']?>' /></div>
					<div><input type='text' name='mb_addr_jibeon' value='<?=$minfo['mb_addr_jibeon']?>' /></div>
				</div>
				<div><span class='sub-title'>서명</span> <textarea name='mb_name'><?=$minfo['mb_signature']?></textarea></div>
				
				<div><span class='sub-title'>자기소개</span> <textarea name='mb_name'><?=$minfo['mb_profile']?></textarea></div>
				
				
			</div>
		</div>
		<div>
			<div class='member-control'>회원 통제</div>
			<div class='member-control'>
				<div><span class='sub-title'>포인트</span> <input type='text' name='mb_hp' value='<?=$minfo['mb_point']?>' /></div>
				<div><span class='sub-title'>레벨</span> <input type='text' name='mb_level' value='<?=$minfo['mb_level']?>' /></div>
				<div><span class='sub-title'>비밀번호 변경</span> <input type='text' name='mb_password' /></div>
				<div>
					<? if ( $minfo['mb_intercept_date'] ) {?>
						<span class='sub-title'>차단일</span> <?=$minfo['mb_intercept_date']?>
							<input type='checkbox' name='unblock' value=1 /> 차단해제
					<? }
						else {?>
							<input type='checkbox' name='block' value=1 /> 차단하기
						<?}?>
				</div>
				<div>
					<? if ( $minfo['mb_leave_date'] ) {?>
						<span class='sub-title'>탈퇴일</span> <?=$minfo['mb_leave_date']?>
						<input type='checkbox' name='unleave' value=1 /> 탈퇴 취소
					<?}
						else {?>
							<input type='checkbox' name='leave' value=1 /> 탈퇴 시키기
						<? }?>
				</div>
			</div>
		</div>
		<input type='submit' value='업데이트' />
	</div>
</form>
