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
	<div class='title'><?=ln('Site Info')?></div>	
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr valign='top'>
				<td>
					<span>Main Title</span><input type='text' name='title' value='<?=$extra['title']?>'>
				</td>
				<td>
					<span>Secondary Title</span><input type='text' name='secondary_title' value='<?=$extra['secondary_title']?>'>
				</td>
			</tr>
			<tr>
				<td>
					<span>Header Text</span><input type='text' name='header_text' value='<?=$extra['header_text']?>'>
				</td>
				<td>	
					<span>Footer Text</span><input type='text' name='footer_text' value='<?=$extra['footer_text']?>'>
				</td>
			</tr>
		</table>
		<div class='middle-title'>Forums on First Page, Forum 1, is the Main Forum</div>
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
						
						echo $default_value ? $default_value : 'Select Forum';
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
						<div class='title'>Header Logo</div>
						<?if( $extra['header_logo'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['header_logo']?>" width=280px height=160px><br><?}?>
						<input type='file' name='header_logo'>
						<div class='title'>Logo Text</div>
						<input type='text' name='logo_text' value='<?=$extra['logo_text']?>'>
					</td>
					<td>
						<div class='title'>Banner 1</div>
						<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_1']?>" width=280px height=160px><br><?}?>
						<input type='file' name='banner_1'>
						<div class='title'>Banner 1 Text 1</div>
						<input type='text' name='banner1_text1' value='<?=$extra['banner1_text1']?>'><br>
						<div class='title'>Banner 1 Text 2</div>
						<input type='text' name='banner1_text2' value='<?=$extra['banner1_text2']?>'>
					</td>
				</tr>
				<tr valign='top'>
					<td>
						<div class='title'>Profile Photo</div>
						<?if( $extra['profile_img'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['profile_img']?>" width=280px height=160px><br><?}?>
						<input type='file' name='profile_img'><br>
						<div class='title'>Profile 1 Text 1</div>
						<input type='text' name='profile_text1' value='<?=$extra['profile_text1']?>'>
						<div class='title'>Profile 1 Text 2</div>
						<input type='text' name='profile_text2' value='<?=$extra['profile_text2']?>'>
					</td>
					<td>
						<div class='title'>Banner 2</div>
						<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_2']?>" width=280px height=160px><br><?}?>
						<input type='file' name='banner_2'>
						<div class='title'>Banner 2 Text 1</div>
						<input type='text' name='banner2_text1' value='<?=$extra['banner2_text1']?>'>
						<div class='title'>Banner 2 Text 2</div>
						<input type='text' name='banner2_text2' value='<?=$extra['banner2_text2']?>'>
					</td>
				</tr>
			</table>
		

		
		<div class='title-bottom'>Additional Settings</div>
		<div><span class='title-small'>Display Sidebar on:</span>
			<input type="radio" name="theme_sidebar" value="left" <?if($extra['theme_sidebar'] =='left') echo "checked"?>><span class='radio-left'>Left</span> 
			<input type="radio" name="theme_sidebar" value="right" <?if(!$extra['theme_sidebar'] || $extra['theme_sidebar'] == 'right') echo "checked"?>><span class='radio-right'>Right</span>
		</div>
		
		<input type='submit'>
		<div style='clear:right;'></div>

</div>
</form>