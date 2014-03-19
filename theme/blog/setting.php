<?php
function setTopMenu( $name ) {
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
	<input type='text' name='<?=$name?>_bo_table' value="" placeholder=" 게시판 아이디 직접 입력" style='height: 23px; width: 150px; line-height: 23px; padding: 0 10px;' />
<?
	return $content = ob_get_clean();
}
?>

<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>프로필 사진 및 문구</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_blog_1_1' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_blog_1_1'>	
	</div>
		<table cellpadding='10' cellspacing='0' class='image-config'>
		<tr>
			<td valign='top'>
				<div class='image-title'>프로필 사진등록</div>

				<div class='image-upload'>
					<?
					if( file_exists( x::path_file( "profile_photo" ) ) ) echo "<img src='".x::url_file( "profile_photo" )."'>";
					else  echo "<div class='setting-no-image'>이미지가 없습니다. [가로 190px X 세로 140px]</div>";?>
					<input type='file' name='profile_photo'>
					<input type='checkbox' name='profile_photo_remove' value='y'><span class='title-small'>이미지 제거</span>
				
				</div>
			</td>
			<td  valign='top'>
				<div class='image-title'>프로필 하단 문구</div>
			
				<textarea name='profile_message' style='border-top: 0; padding: 10px;'><?=stripslashes(x::meta('profile_message'))?></textarea>
			</td>
		</tr>
	</table>
</div>
</div>
<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>첫 페이지 본문 게시판</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_blog_1_2' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_blog_1_2'>	
	</div>
		<div>메인 게시판 <?=setTopMenu('forum_no_1')?></div>
		<? for ( $i=2; $i <= 10; $i++ ) {?>
			<div>게시판<?=$i?> <?=setTopMenu('forum_no_'.$i)?></div>
		<?}?>
	</div>
	<input type='submit' value='업데이트' />
</div>
<br /><br />
<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>사이드 배너 이미지</span>
		<span class='config-title-notice'>
			<span class='user-google-guide-button' page = 'google_doc_blog_1_3' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[설명 보이기]</span>
			<img src='<?=module('img/setting_2.png')?>'>
		</span>
	</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_blog_1_3'>	
	</div>
		<table cellpadding='10' cellspacing='0' class='image-config'>
			<tr valign='top'>
			<?php
				for ( $i=1; $i <= 4; $i++) {
					if ( $i == 3 ) echo "</tr><tr valign='top'>";
			?>
				<td width='50%'>
					<div class='image-title'>배너<?=$i?></div>
						<div class='image-upload'>
						<?if( file_exists( x::path_file( 'banner_'.$i ) ) ) {
							echo "<img style='width:178px;' src='".x::url_file( 'banner_'.$i)."'>"; 
						} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 178px]</div>"; ?>
							<input type='file' name='banner_<?=$i?>'>
							<div class='title'>배너1 링크</div>
							<input type='text' name='banner_<?=$i?>_url' value='<?=meta('banner_1_url')?>'>
							<input type='checkbox' name='banner_<?=$i?>_remove' value='y'><span class='title-small'>이미지 제거</span>
						</div>
				</td>
				
			<?}?>
			</tr>
			<tr valign='top' >
				<td colspan='2'>
					<div class='image-title'>Registration Logo</div>
						<div class='image-upload'>
						<?if( file_exists( x::path_file( 'registration_logo') ) ) {
							echo "<img style='width:178px;' src='".x::url_file( 'registration_logo' )."'>"; 
						} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 225px]</div>"; ?>
							<input type='file' name='registration_logo'>
							<input type='checkbox' name='banner_<?=$i?>_remove' value='y'><span class='title-small'>이미지 제거</span>
						</div>
				</td>	
			</tr>
		</table>
	</div>
	<input type='submit' value='업데이트' />
	<br /><br />
</div>