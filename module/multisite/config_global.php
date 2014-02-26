<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
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
	<div class='config-main-title'><div class='inner'><img src='<?=x::url().'/module/multisite/img/direction.png'?>'> 사이트 정보</div></div>
		<div class='config-wrapper'>
			<div class='config-title'><span class='config-title-info'>BASIC SITE SETTINGS</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>	
			<div class='config-container'>
				<table cellpadding=0 cellspacing=0 width='100%'>
					<tr valign='top'>
						<td >
							<span>메인 타이틀</span><input type='text' name='title' value='<?=ms::meta('title')?>'>
						</td>
					</tr>
					<tr valign='top'>
						<td>
							<span>서브 타이틀</span><input type='text' name='secondary_title' value='<?=ms::meta('secondary_title')?>'>
						</td>
					</tr>
					<tr valign='top'>
						<td>
							하단 문구<textarea name='footer_text' style='margin-left: 49px; height: 50px; width: 233px;'><?=stripslashes(ms::meta('footer_text'))?></textarea>
						</td>
					</tr>
					<tr valign='top'>
						<td>						
							<div><span class='title-small'>사이드 바 위치:</span>
								<input type="radio" name="theme_sidebar" value="left"  <?if(!ms::meta('theme_sidebar') || ms::meta('theme_sidebar') == 'left') echo "checked"?>><span class='radio-left'>왼쪽</span> 
								<input type="radio" name="theme_sidebar" value="right" <?if(ms::meta('theme_sidebar') =='right') echo "checked"?>><span class='radio-right'>오른쪽</span>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class='config-wrapper'>
			<div class='config-title'><span class='config-title-info'>첫 페이지에 나타날 글의 게시판을 선택하십시오.</span><span class='config-title-notice'><img src='<?=x::url().'/module/multisite/img/setting_2.png'?>'></span></div>
			<div class='config-container'>
				<? for ( $i = 1; $i <= 10; $i++ ) { ?>
					<div>
						<span class='select-wrapper'><span class='inner'>
							<?php
							foreach ( $rows as $row ) {
								if ( ms::meta('forum_no_'.$i) && ms::meta('forum_no_'.$i) == $row['bo_table'] ) {
									$default_value =  $row['bo_subject'];
									break;
								}
								else $default_value = null;
							}
							
							echo $default_value ? $default_value : '게시판 선택';
							?>
						</span></span>
						<span class='select-button'><span class='inner'>
							<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
						</span></span>
						<div class='drop-down-menu'>
							<div class='row' bo_table='' bo_subject='게시판 선택'>게시판 선택</div>
							<?php
								foreach ( $rows as $row ) {
									echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
								}
							?>
						</div>
						<input class='hidden-value' type='hidden' name='forum_no_<?=$i?>' value='<?=ms::meta('forum_no_'.$i)?>' />
					</div>
				<? } ?>
			</div>
		</div>
		
		<? if ( ms::meta('theme') ) { ?>
			<?php
				if ( file_exists( ms::theme('setting') ) ) include ms::theme('setting');
			?>
		<? } else { ?>
			<h1>테마를 선택하십시오.</h1>
		<? } ?>
		
		
		
		<input type='submit' value='업데이트'>
		<div style='clear:right;'></div>

</div>
</form>