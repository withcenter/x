<?php
function setTopMenu( $name ) {
	global $cfgs;
	
	ob_start();
	if ( ms::exist() ) {
		$cfgs = ms::forums();
		if ( ! empty( $cfgs ) ) {
	?>
	<select name='<?=$name?>'>
		<option value=''>게시판을 선택하세요</option>
		<option value=''></option>
		<? foreach ( $cfgs as $c ) { 
			if ( $c['bo_table'] == x::meta($name) ) $selected = 'selected';
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
			<span class='config-title-info'>탑 메뉴 설정</span>			
			<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_2_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
		<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_2_1'>	
</div>
			<table cellpadding=0 cellspacing=0 width='100%'>
				<tr valign='top'>
					<td>
						<? for ( $i = 1; $i <=2; $i++ ) {?>
							<div class='menu-item-list'>상단1-<?=$i?> : <?=setTopMenu('forum_no_'.$i)?></div>
						<? }?>
					</td>
					<td width=10></td>
					<td>
						<? for ( $i = 3; $i <=6; $i++ ) {?>
							<div class ='menu-item-list'>상단2-<?=$i-3?> : <?=setTopMenu('forum_no_'.$i)?></div>
						<? }?>
					</td>
				</tr>
			</table>	
		</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
	</div>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이트 추가 설정</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_1_2' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
	<div class='config-container' cellspacing='0' cellpadding='10' >
	<div class='hidden-google-doc google_doc_travel_1_2'>	
	</div>
		<table>
			<tr>
				<td colspan='2'><span class='title-small'>하단문구제목</span><input type='text' name='travel_2footer_tagline' value='<?=x::meta('travel_2footer_tagline')?>' /></td>
			<tr>
		</table>
	</div>
	<input type='submit' value='업데이트'>
	<div style='clear:right;'></div>
</div>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이트 상하단 로고 & 로고 문구</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_1_3' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
	</div>
<div class='config-container'>
<div class='hidden-google-doc google_doc_travel_1_3'>	
</div>
<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>
	<tr valign='top' >
		<td width='50%'> 
			<div class='image-title'>
				<img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>사이트 로고				
			</div>
			<div class='image-upload'>
			<?
				if( file_exists( path_logo() ) ) echo "<img src='".url_logo()."'>";
				else {
			?>
				<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>
				[가로 310px X 세로 60px]</div>
			<?
				}
			?>
				<input type='file' name='<?=code_logo()?>'>
				<input type='checkbox' name='<?=code_logo()?>_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</td>

		<td width='50%'>		
			<div class='image-title'><img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>사이트 하단 로고</div>
			<div class='image-upload'>
			<?
				if( file_exists( x::path_file( "travel_footer_logo" ) ) ) echo "<img src='".x::url_file( "travel_footer_logo" )."'>";
				else {
			?>
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 100px X 세로 90px]</div>
				<?}?>
				<input type='file' name='travel_footer_logo'>
					<input type='checkbox' name='travel_footer_logo_remove' value='y'><span class='title-small'>이미지 제거</span>
			</div>
		</td>
	</tr>
</table>

</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div>
 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>메인 롤링 배너</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_1_4' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_1_4'>	
	</div>
	<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>
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
						<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 748px X 세로 238px]</div>
					<?}?>
					<input type='file' name='banner<?=$i?>'>
						<input type='checkbox' name='banner<?=$i?>_remove' value='y'><span class='title-small'>이미지 제거</span>
					
					<div class='title'>배너<?=$i?>의 문구</div>
					<textarea name='banner<?=$i?>_text'><?=stripslashes(x::meta("banner{$i}_text"))?></textarea>
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
 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>오른쪽 날개 배너</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_1_5' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_1_5'>	
	</div>
	<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>	
		<tr valign='top'>
		<?
				for ( $i=1; $i<=3; $i ++ ) {
			?>
				<td>		
					<div class='image-title'><img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>오른쪽 날개 배너<?=$i?></div>
					<div class='image-upload'>
					<?
						if( file_exists( x::path_file( "travel_2floating_banner$i" ) ) ) echo "<img src='".x::url_file( "travel_2floating_banner$i" )."'>";
						else {
					?>
							<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 70px X 세로 70px]</div>
						<?}?>
						<input type='file' name='travel_2floating_banner<?=$i?>'>
							<input type='checkbox' name='travel_2floating_banner<?=$i?>_remove' value='y'><span class='title-small'>이미지 제거</span>
						<div class='title'>오른쪽 날개 배너<?=$i?> 링크</div>
						<input type='text' name='travel_2floating_banner<?=$i?>_url' value='<?=x::meta("travel_2floating_banner{$i}_url")?>'>
					</div>
				</td>
				
			<?
				}
			?>
		</tr>
	</table>

	</div><!--/config-container-->
			<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div><!--config-wrapper-->

 <div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>중앙 사이드 배너, 하단 배너</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_travel_1_6' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_travel_1_6'>	
	</div>
	<table cellspacing='0' cellpadding='10' class='image-config' width='100%'>	
		<tr valign='top'>
		<td>		
				<div class='image-title'><img src='<?=x::url()?>/module/<?=$module?>/img/img-icon.png'>왼쪽 사이드 배너</div>
				<div class='image-upload'>
				<?						

					if( file_exists( x::path_file( "travel_left_banner" ) ) ) echo "<img src='".x::url_file(  "travel_left_banner" )."'>";
					else {
				?>				
						<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 208px X 세로 88px]</div>
					<?}?>
					<input type='file' name='travel_left_banner'>
						<input type='checkbox' name='travel_left_banner_remove' value='y'><span class='title-small'>이미지 제거</span>

					<div class='title'>왼쪽 사이드 배너 링크</div>
					<input type='text' name='travel_2left_banner_url' value='<?=x::meta("travel_2left_banner_url")?>'>
				</div>
			</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>오른쪽 사이드 배너</div>
			<div class='image-upload'>
			<?						

				if( file_exists( x::path_file( "travel_right_banner" ) ) ) echo "<img src='".x::url_file(  "travel_right_banner" )."'>";
				else {
			?>				
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 208px X 세로 88px]</div>
				<?}?>
				<input type='file' name='travel_right_banner'>
					<input type='checkbox' name='travel_right_banner_remove' value='y'><span class='title-small'>이미지 제거</span>

				<div class='title'>왼쪽 사이드 배너 링크</div>
				<input type='text' name='travel_2right_banner_url' value='<?=x::meta("travel_2right_banner_url")?>'>
			</div>
		</td>
		</td>

		<td>
			<div class='image-title'><img src='<?=x::url()?>/module/multisite/img/img-icon.png'>하단 배너</div>
			<div class='image-upload'>
			<?						

				if( file_exists( x::path_file( "travel_bottom_banner" ) ) ) echo "<img src='".x::url_file(  "travel_bottom_banner" )."'>";
				else {
			?>				
					<div class='setting-no-image'><img class='no-image' src='<?=x::url()?>/module/<?=$module?>/img/no-image.png'><br>[가로 208px X 세로 88px]</div>
				<?}?>
				<input type='file' name='travel_bottom_banner'>
					<input type='checkbox' name='travel_bottom_banner_remove' value='y'><span class='title-small'>이미지 제거</span>

				<div class='title'>하단 배너 링크</div>
				<input type='text' name='travel_2bottom_banner_url' value='<?=x::meta("travel_2bottom_banner_url")?>'>
			</div>
		</td>
		
	</tr>
</table>
</div>
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>
</div>