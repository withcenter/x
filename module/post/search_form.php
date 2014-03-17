<?php
$forums = x::forums();

$sel_forum = "<select name='search_forum'>
				<option value=''>게시판 선택</option>
				<option value=''>전체 게시판</option>
				<option value=''></option>
";
foreach ( $forums as $forum ) {
	if ( $search_forum == $forum['bo_table'] ) $selected = "selected";
	else $selected = null;
	
	$sel_forum .= "<option value='$forum[bo_table]' $selected>$forum[bo_subject]</option>";
}

$sel_forum .= "</select>";
?>
<form method='get'>
	<input type='hidden' name='module' value='<?=$module?>' />
	<input type='hidden' name='action' value='search' />
	<input type='checkbox' name='search_username' value=1 <?=$search_username?"checked=1":''?> />글쓴이
	<input type='checkbox' name='search_subject' value=1 <?=$search_subject?"checked=1":''?> />제목
	<input type='checkbox' name='search_content' value=1 <?=$search_content?"checked=1":''?> />내용
	<input type='checkbox' name='search_comment' value=1 <?=$search_comment?"checked=1":''?> />코멘트
	게시판 <?=$sel_forum?>
	
	<input type='text' name='key' value='<?=$key?>' />
	<input type='submit' value='검색' />
	
</form>