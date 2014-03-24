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
		<span class='config-title-info'>POSTS ON FRONT PAGE</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_mobile_1_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_1_4'>	
	</div>
		<table cellspacing='0' cellpadding='0' width='100%' class='gallery-config-table'>
			<tr valign='top'><td width='180' class='gallery-config-title'>GALLERY FORUM LEFT</td><td><?=set_posts('gallery_forum_left')?></td></tr>
			<tr valign='top'><td class='gallery-config-title'>GALLERY FORUM RIGHT</td><td><?=set_posts('gallery_forum_right')?></td></tr>
			<tr valign='top'><td class='gallery-config-title'>FORUM POSTS AS LIST 1</td><td><?=set_posts('gallery_forum_list_1')?></td></tr>
			<tr valign='top'><td class='gallery-config-title'>FORUM POSTS AS LIST 2</td><td><?=set_posts('gallery_forum_list_2')?></td></tr>
		</table>
	</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
<div class='config-title'>
	<span class='config-title-info'>메인 롤링 배너</span>
	<span class='config-title-notice'>
		<span class='user-google-guide-button' page = 'google_doc_travel_1_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
		<img src='<?=module('img/setting_2.png')?>'>
	</span>
	</div>
<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_1_4'>	
</div>
<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>
	<tr valign='top'>
		<td colspan='2'>
			<div class='image-title'>
				<img src='<?=module('img/img-icon.png')?>'>사이트 로고				
			</div>
			<div class='image-upload'>
			<?
				if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
				else {
			?>
				<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>
				[가로 250px X 세로 100px]</div>
			<?
				}
			?>
				<input type='file' name='<?=code_logo()?>'>
				<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</td>
		<td>
			<div class='image-title'><img src='<?=module('img/img-icon.png')?>'>사이트 하단 로고</div>
			<div class='image-upload'>
			<?
				if( file_exists( x::path_file( "gallery_footer_logo" ) ) ) echo "<img src='".x::url_file( "gallery_footer_logo" )."'>";
				else {
			?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 72px X 세로 103px]</div>
				<?}?>
				<input type='file' name='gallery_footer_logo'>
					<input type='checkbox' name='gallery_footer_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
						<span class='title-small'>하단문구제목</span><input type='text' name='gallery_footer_tagline' value='<?=x::meta('gallery_footer_tagline')?>' />
			</div>	
		</td>
	</tr>
	<?
		for ( $i=1; $i<=5; $i ++ ) {
			if ( $i == 1 || $i == 4 ) echo "<tr valign='top'>";
	?>
		<td>		
			<div class='image-title'><img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>배너이미지<?=$i?></div>
			<div class='image-upload'>
			<?
				if( file_exists( x::path_file( "banner$i" ) ) ) echo "<img src='".x::url_file( "banner$i" )."'>";
				else {
			?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 968px X 세로 318px]</div>
				<?}?>
				<input type='file' name='banner<?=$i?>'>
					<input type='checkbox' name='banner<?=$i?>_remove' value='y'><span class='title-small'>이미지 제거</span>
				<div class='title'>BANNER <?=$i?> SUBJECT</div>
				<input type='text' name='banner<?=$i?>_subject' value='<?=stripslashes(x::meta("banner{$i}_subject"))?>'>				
				<div class='title'>BANNER <?=$i?> CONTENT</div>
				<textarea name='banner<?=$i?>_content'><?=stripslashes(x::meta("banner{$i}_content"))?></textarea>
				<div class='title'>배너<?=$i?> 링크</div>
				<input type='text' name='banner<?=$i?>_url' value='<?=x::meta("banner{$i}_url")?>'>
			</div>
		</td>
		
	<?
		}
	?>
</table>

</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>