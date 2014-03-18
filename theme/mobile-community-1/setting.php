<? function set_posts( $name ) {
	global $cfgs;
	
	ob_start();
	if ( x::site() ) {
		$cfgs = x::forums();
		if ( ! empty( $cfgs ) ) {
	?>
	<select name='<?=$name?>'>
		<option value=''>게시판을 선택하세요</option>
		<option value=''></option>
		<? foreach ( $cfgs as $c ) { 
			if ( $c['bo_table'] == meta($name) ) $selected = 'selected';
			else $selected = null;
		?>
			<option value="<?=$c['bo_table']?>" <?=$selected?>><?=$c['bo_subject']?></option>
		<? } ?>
	</select>
	<script>
	$(function(){
		$("[name='<?=$name?>']").change(function(){
			$("[name='<?=$name?>_bo_table']").val($(this).val());
		});
	});
	</script>
	<?
		}
	}?>
	<input type='text' name='<?=$name?>_bo_table' value="<?=x::meta($name."_name")?>" placeholder=" 게시판 아이디 직접 입력" style='height: 23px; width: 140px; line-height: 23px; padding: 0 10px;' />
<?
	return $content = ob_get_clean();
}
?>


<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>추가 설정</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_1_1'>	
	</div>
		<table>
			<tr>
				<td colspan='2'><span class='title-small'>전화번호</span><input type='text' name='mobile_contact_num' value='<?=x::meta('mobile_contact_num')?>' /></td>
			<tr>
		</table>
	</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'><span class='config-title-info'>사이트 로고</span></span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_2' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_mobile_1_2'>	
	</div>	
	
	<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>
	<tr valign='top' >
		<td width='50%'> 
			<div class='image-title'>
				<img src='<?=module('img/img-icon.png')?>'>사이트 로고				
			</div>
			<div class='image-upload'>
			<?
				if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
				else {
			?>
				<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>
				[가로 209px X 세로 59px]</div>
			<?
				}
			?>
				<input type='file' name='<?=code_logo()?>'>
				<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</td>
	</table>

		
	</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div> 

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이트 메인에 보일 게시판</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_1_4'>	
	</div>
		<table cellpadding=0 cellspacing=0>
			<tr valign='top'>
				<td>상단 갤러리 게시판 <?=set_posts('top_forum_with_images')?></td>
			<tr>
			<tr valign='top'>
				<td>
						<? for ( $i = 1; $i <=4; $i++ ) {?>
							<div>중앙 게시판 <?=$i?> <?=set_posts('middle_forum_'.$i)?></div>
						<?}?>
				</td>
			<tr>
			<tr valign='top'>
				<td>
					<? for ( $i = 1; $i <=2; $i++ ) {?>
					<div>하단 게시판 <?=$i?> <?=set_posts('bottom_forum_'.$i)?></div>
					<?}?>
				</td>
			<tr>
		</table>
	</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'><span class='config-title-info'>인기글 및 최신글</span></span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_3' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_mobile_1_3'>	
	</div>	
		<table cellpadding=0 cellspacing=0 class='mobile-meta-table' width='100%'>
		<tr class='mobile-table-header'><td width='50' align='center'>번호</td><td width='240'>최신글</td><td>게시물 갯수</td></tr>
			<? for ( $i = 1; $i <=10; $i++ ) {?>
				<tr valign='top'>
					<td align='center'><?=$i?></td>
					<td><?=set_posts('latest_forum_no_'.$i)?></td>
					<td class='no_of_posts'><input type='text' name='latest_no_of_posts_<?=$i?>' value='<?=x::meta('latest_no_of_posts_'.$i)?>'></td>
				</tr>
			<?}?>
		<tr class='mobile-table-header'><td width='50' align='center'>번호</td><td>게시판</td><td>게시물 갯수</td></tr>
			<? for ( $i = 1; $i <=10; $i++ ) {?>
				<tr valign='top'>
					<td align='center' ><?=$i?></td>
					<td><?=set_posts('popular_forum_no_'.$i)?></td>
					<td  class='no_of_posts'><input type='text' name='popular_no_of_posts_<?=$i?>' value='<?=x::meta('popular_no_of_posts_'.$i)?>'></td>
				</tr>
			<? }?>
		</table>


		
	</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div> 