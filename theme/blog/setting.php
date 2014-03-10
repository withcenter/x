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
			if ( $c['bo_table'] == ms::meta($name) ) $selected = 'selected';
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
		<span class='user-google-guide-button' page = 'google_doc_blog_1'>[도움말]</span>
		<span class='config-title-notice'>
			<img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'>
		</span>
		</div>
	<div class='config-container'>
	<div class='hidden-google-doc google_doc_blog_1'>	
		<div>필고 사이트 서비스 설명서:</div>
		<iframe src="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep" style='width:99.5%; height: 400px;'></iframe>	
	</div>
		<table cellpadding='10' cellspacing='0' class='image-config'>
		<tr>
			<td valign='top'>
				<div class='image-title'>프로필 사진등록</div>

				<div class='image-upload'>
				<?if( ms::meta('blog_profile_photo') ) {
					echo "<img src=".ms::meta('img_url').ms::meta('blog_profile_photo').">"; 
				} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 190px X 세로 140px]</div>"; ?>
				<input type='file' name='blog_profile_photo'>
				<?if( ms::meta('blog_profile_photo') != '' ) { ?>
					<input type='hidden' name='blog_profile_photo_remove' value='n'>
					<input type='checkbox' name='blog_profile_photo_remove' value='y'><span class='title-small'>이미지 제거</span>
				<?}?>
				</div>
			</td>
			<td  valign='top'>
				<div class='image-title'>프로필 하단 문구</div>
			
				<textarea name='blog_profile_message' style='border-top: 0; padding: 10px;'><?=stripslashes(ms::meta('blog_profile_message'))?></textarea>
			</td>
		</tr>
	</table>
</div>
</div>
<div class='config-wrapper'>
	<div class='config-title'>
		<span class='config-title-info'>첫 페이지 본문 게시판</span>
	</div>
	<div class='config-container'>
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
	</div>
	<div class='config-container'>
		<table cellpadding='10' cellspacing='0' class='image-config'>
			<tr valign='top'>
				<td width='50%'>
					<div class='image-title'>배너1</div>
						<div class='image-upload'>
						<?if( ms::meta('banner_1') ) {
							echo "<img style='width:178px;' src=".ms::meta('img_url').ms::meta('banner_1').">"; 
						} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 178px]</div>"; ?>
							<input type='file' name='banner_1'>
							<div class='title'>배너1 링크</div>
							<input type='text' name='banner_1_url' value='<?=ms::meta('banner_1_url')?>'>
						<?if( ms::meta('banner_1') != '' ) { ?>
							<input type='hidden' name='banner_1_remove' value='n'>
							<input type='checkbox' name='banner_1_remove' value='y'><span class='title-small'>이미지 제거</span>
						<?}?>
					</div>
				</td>
				<td width='50%'>
					<div class='image-title'>배너2</div>
						<div class='image-upload'>
						<?if( ms::meta('banner_2') ) {
							echo "<img style='width:178px;' src=".ms::meta('img_url').ms::meta('banner_2').">"; 
						} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 178px]</div>"; ?>
							<input type='file' name='banner_2'>
							<div class='title'>배너2 링크</div>
							<input type='text' name='banner_2_url' value='<?=ms::meta('banner_2_url')?>'>
						<?if( ms::meta('banner_2') != '' ) { ?>
							<input type='hidden' name='banner_2_remove' value='n'>
							<input type='checkbox' name='banner_2_remove' value='y'><span class='title-small'>이미지 제거</span>
						<?}?>
					</div>
				</td>
			</tr>
			<tr valign='top'>
				<td width='50%'>
					<div class='image-title'>배너3</div>
						<div class='image-upload'>
						<?if( ms::meta('banner_3') ) {
							echo "<img style='width:178px;' src=".ms::meta('img_url').ms::meta('banner_3').">"; 
						} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 178px]</div>"; ?>
							<input type='file' name='banner_3'>
							<div class='title'>배너3 링크</div>
							<input type='text' name='banner_3_url' value='<?=ms::meta('banner_3_url')?>'>
						<?if( ms::meta('banner_3') != '' ) { ?>
							<input type='hidden' name='banner_3_remove' value='n'>
							<input type='checkbox' name='banner_3_remove' value='y'><span class='title-small'>이미지 제거</span>
						<?}?>
					</div>
				</td>
				<td width='50%'>
					<div class='image-title'>배너4</div>
						<div class='image-upload'>
						<?if( ms::meta('banner_4') ) {
							echo "<img style='width:178px;' src=".ms::meta('img_url').ms::meta('banner_4').">"; 
						} else echo "<div class='setting-no-image'>이미지가 없습니다. [가로 178px]</div>"; ?>
							<input type='file' name='banner_4'>
							<div class='title'>배너4 링크</div>
							<input type='text' name='banner_4_url' value='<?=ms::meta('banner_4_url')?>'>
						<?if( ms::meta('banner_1') != '' ) { ?>
							<input type='hidden' name='banner_4_remove' value='n'>
							<input type='checkbox' name='banner_4_remove' value='y'><span class='title-small'>이미지 제거</span>
						<?}?>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<input type='submit' value='업데이트' />
	<br /><br />
</div>