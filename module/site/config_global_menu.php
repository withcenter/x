<?php

	if ( empty($theme_config["menu_$id"]["max"]) ) return;
	
?>

<? if ( empty( $_config_global_menu ) ) { $_config_global_menu = true; ?>
<script>
$(function(){
	$("[name='select_bo_table']").change(function(){
		$(this).parent().parent().find('.bo_table').val($(this).val());
	});
});
</script>
<? } ?>



 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'><?=$theme_config["menu_$id"]["name"]?> 설정</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_community_2_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	
	<div class='hidden-google-doc google_doc_community_2_1'>	
	</div>
	
	<div class='config-container'>
	
	
		<table cellpadding=0 cellspacing=0 border=0 width='100%'>
			<tr>
				<td>번호</td>
				<td>메뉴 타입</td>
				<td>URL 또는 게시판 아이디</td>
				<td>메뉴 이름</td>
				<td>새창</td>
			</tr>
			<?
				$forums = x::forums();
				for ( $i=1; $i<=$theme_config["menu_$id"]["max"]; $i++ ) {
				
				 
			?>
					<tr>
						<td><?=$i?></td>
						<td>
							<select name='select_bo_table'>
								<option value=''>메뉴 선택</option>
								<option value=''></option>
								<option value=''<? if ( x::menu_type( x::menu( $i, $id ) ) == 'url' ) echo " selected=true";?>>직접 URL 입력</option>
								<option value=''></option>
								<? foreach ( $forums as $c ) { ?>
									<option value="<?=$c['bo_table']?>"<?if (  x::menu( $i, $id ) == $c['bo_table'] ) echo " selected=true"?>><?=$c['bo_subject']?></option>
								<? } ?>
							</select>
						</td>
						<td><input type='text' class='bo_table' name='menu<?=$id?><?=$i?>bo_table' value="<?=x::menu($i, $id)?>" placeholder=" Input bo_table ex) qna"></td>
						<td><input type='text' class='menu_name' name='menu<?=$id?><?=$i?>name' value="<?=x::menu_name($i,$id)?>" placeholder=" Menu Name"></td>
						<td><input type='checkbox' name='menu<?=$id?><?=$i?>target' value="Y"<?if (  x::menu_target( $i, $id ) ) echo " checked=true"?>></td>
					</tr>
			<? } ?>
		</table>
	
	</div>
	
		<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>
