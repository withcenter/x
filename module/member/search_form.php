<?php

$q = array();

if ( $username ) $q[] = "( mb_id LIKE '%".$username."%' OR mb_nick LIKE '%".$username."%' OR mb_name LIKE '%".$username."%' )";

if ( $domain_name ) $q[] = REGISTERED_DOMAIN . " LIKE '%".$domain_name."%'";

if ( $phone_number ) $q[] = "( mb_tel LIKE '%".$phone_number."%' OR mb_hp LIKE '%".$phone_number."%' )";

if ( $email ) $q[] = "mb_email LIKE '%".$email."%'";

if ( $blocked ) $q[] = "mb_intercept_date <> ''";

if ( $resign ) $q[] = "mb_leave_date <> ''";

if ( $q ) $conds = " WHERE ".implode ( " AND ", $q );
?>
<form method='get'>
	<input type='hidden' name='module' value='<?=$module?>' />
	<input type='hidden' name='action' value='<?=$action?>' />
	<table cellpadding=0 cellspacing=0 width='100%' border=1>
		<tr valign='top'>
			<td>도메인</td> <td><input type='text' name='domain_name' value='<?=$domain_name?>' /></td>
			<td>아이디/이름/닉네임</td><td><input type='text' name='username' value='<?=$username?>' /></td>
			<td rowspan='3'><input type='submit' value='검색' /></td>
		</tr>
		<tr valign='top'>
			<td>전화번호</td><td><input type='text' name='phone_number' value='<?=$phone_number?>' /></td>
			<td>이메일</td><td><input type='text' name='email' value='<?=$email?>' /></td>
		</tr>
		<tr>
			<td><input type='checkbox' name='blocked' value=1 <?=$blocked?"checked=1":''?> />차단된 회원</td>
			<td><input type='checkbox' name='resign' value=1 <?=$resign?"checked=1":''?> />탈퇴한 회원</td>
			<td colspan=2></td>
		</tr>
	</table>
</form>
