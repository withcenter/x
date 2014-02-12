<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	$extra = ms::get_extra();
	/* 생성된 게시판 정보를 가저온다 */
	$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";
	
	$q = "SELECT bo_table, bo_subject, bo_count_write FROM $g5[board_table] WHERE $qb";
	
	$rows = db::rows( $q );
	
	$no_of_board = count($rows);	
?>
<script src='<?=x::url()?>/module/multisite/subsite.js'></script>
<form action='?' class='config_general' method='POST' enctype='multipart/form-data'>
		<input type='hidden' name='module' value='multisite'>
		<input type='hidden' name='action' value='config_global_submit'>
<div class='config site-global'>
	<div class='title'>사이트 정보</div>	
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td>
					<span>메인 타이틀</span><input type='text' name='title' value='<?=$extra['title']?>'>
				</td>
				<td>
					<span>서브 타이틀</span><input type='text' name='secondary_title' value='<?=$extra['secondary_title']?>'>
				</td>
			</tr>
			<tr>
				<td>
					<span>하단 문구</span><input type='text' name='footer_text' value='<?=$extra['footer_text']?>'>
				</td>
			</tr>
		</table>
		<div class='middle-title'>첫 페이지에 나타날 글의 게시판을 선택하십시오.</div>
			<div class="select-box-left">
			<? for ( $i = 1; $i <= 5; $i++ ) { ?>
				<div>
					<div class='select-wrapper'><div class='inner'>
						<?php
						foreach ( $rows as $row ) {
							if ( $extra['forum_no_'.$i] && $extra['forum_no_'.$i] == $row['bo_table'] ) {
								$default_value =  $row['bo_subject'];
								break;
							}
							else $default_value = null;
						}
						
						echo $default_value ? $default_value : '게시판 선택';
						?>
					</div></div>
					<div class='select-button'><div class='inner'>
						<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
					</div></div>
					<div class='drop-down-menu'>
						<?php
							foreach ( $rows as $row ) {
								echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
							}
						?>
					</div>
					<input class='hidden-value' type='hidden' name='forum_no_<?=$i?>' value='<?=$extra['forum_no_'.$i]?>' />
				</div>
			<? } ?>
			</div>
			<div class="select-box-right">
			<? for ( $i = 6; $i <= 10; $i++ ) {?>
				<div>
					<span class='select-wrapper'><span class='inner'>
						<?php
						foreach ( $rows as $row ) {
							if ( $extra['forum_no_'.$i] && $extra['forum_no_'.$i] == $row['bo_table'] ) {
								$default_value =  $row['bo_subject'];
								break;
							}
						}
						
						echo $default_value ? $default_value : 'Select Forum';
						?>
					</span></span>
					<span class='select-button'><span class='inner'>
						<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
					</span></span>
					<span class='drop-down-menu'>
						<?php
							foreach ( $rows as $row ) {
								echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
							}
						?>
					</span>
					<input class='hidden-value' type='hidden' name='forum_no_<?=$i?>' value='<?=$extra['forum_no_'.$i]?>' />
				</div>
			<? } ?>
			</div>	
			<div style='clear:left;'></div>
			
			<table cellpadding=0 cellspacing=0 width='100%' class='image-config'>
				<tr valign='top'>
					<td>
						<div class='title'>사이트 로고</div>
						<?if( $extra['header_logo'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['header_logo']?>" width=280px height=160px><br><?}?>
						<input type='file' name='header_logo'>
						<div class='title'>로고 문구</div>
						<input type='text' name='logo_text' value='<?=$extra['logo_text']?>'>
					</td>
					<td>
						<div class='title'>배너이미지1</div>
						<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_1']?>" width=280px height=160px><br><?}?>
						<input type='file' name='banner_1'>
						<div class='title'>배너1의 문구1</div>
						<input type='text' name='banner1_text1' value='<?=$extra['banner1_text1']?>'><br>
						<div class='title'>배너1의 문구2</div>
						<input type='text' name='banner1_text2' value='<?=$extra['banner1_text2']?>'>
					</td>
				</tr>
				<tr valign='top'>

					<td>
						<div class='title'>배너이미지2</div>
						<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_2']?>" width=280px height=160px><br><?}?>
						<input type='file' name='banner_2'>
						<div class='title'>배너2의 문구1</div>
						<input type='text' name='banner2_text1' value='<?=$extra['banner2_text1']?>'>
						<div class='title'>배너2의 문구2</div>
						<input type='text' name='banner2_text2' value='<?=$extra['banner2_text2']?>'>
					</td>
				</tr>
			</table>
		

		
		<div class='title-bottom'>추가 설정</div>
		<div><span class='title-small'>사이드 바 위치:</span>
			<input type="radio" name="theme_sidebar" value="left" <?if($extra['theme_sidebar'] =='left') echo "checked"?>><span class='radio-left'>왼쪽</span> 
			<input type="radio" name="theme_sidebar" value="right" <?if(!$extra['theme_sidebar'] || $extra['theme_sidebar'] == 'right') echo "checked"?>><span class='radio-right'>오른쪽</span>
		</div>
		
		
		<? if ( ms::meta('theme') ) { ?>
			<?php
				if ( file_exists( ms::theme('setting') ) ) include ms::theme('setting');
			?>
		<? } else { ?>
			<H1>테마를 선택하십시오.</h1>
		<? } ?>
		
		
		
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>

</div>
</form>