<form action='?' method='post' class='config_menu'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">
	<div class='config config-menu'>
		<div class='config-main-title'>
			<div class='inner'>
				<span class='config-title-info'><img src='<?=module('img/direction.png')?>'> 메뉴 선택</span>
				<span class='config-title-notice'>
					<span class='user-google-guide-button inner-title' page = 'google_doc_menu' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
				</span>
				<div style='clear: both'></div>
			</div>
		</div>
		<div class='hidden-google-doc google_doc_menu'></div>
	
		<table cellpadding=0 cellspacing=0 border=0 width='100%'>
			<tr>
				<td>번호</td>
				<td>메뉴 타입 (직접 입력 또는 게시판)</td>
				<td>URL 또는 게시판 아이디</td>
				<td>메뉴 이름</td>
				<td>새창</td>
			</tr>
			<?
				$forums = x::forums();
				for ( $i=1; $i<=10; $i++ ) {
				
				 
			?>
					<tr>
						<td><?=$i?></td>
						<td>
							<select name='select_bo_table'>
								<option value=''>메뉴 선택</option>
								<option value=''></option>
								<option value=''<? if ( x::menu_type( x::menu( $i ) ) == 'url' ) echo " selected=true";?>>직접 URL 입력</option>
								<option value=''></option>
								<? foreach ( $forums as $c ) { ?>
									<option value="<?=$c['bo_table']?>"<?if (  x::menu( $i ) == $c['bo_table'] ) echo " selected=true"?>><?=$c['bo_subject']?></option>
								<? } ?>
							</select>
						</td>
						
						<td><input type='text' class='bo_table' name='menu<?=$i?>bo_table' value="<?=x::menu($i)?>" placeholder=" Input bo_table ex) qna"></td>
						<td><input type='text' class='menu_name' name='menu<?=$i?>name' value="<?=x::menu_name($i)?>" placeholder=" Menu Name"></td>
						<td><input type='checkbox' name='menu<?=$i?>target' value="Y"<?if (  x::menu_target( $i ) ) echo " checked=true"?>></td>
					</tr>
			<? } ?>
		</table>
		<center>
		<input type='submit' class='per-config-submit' style='margin-top: 10px'>
		</center>
		
	</div>

</form>
		<script>
			$(function(){
				$("[name='select_bo_table']").change(function(){
					$(this).parent().find(".bo_table").val($(this).val());
				});
			});
		</script>
		