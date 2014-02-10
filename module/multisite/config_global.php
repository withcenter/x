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
<form action='?' class='config_general' method='POST' enctype='multipart/form-data'>
		<input type='hidden' name='module' value='multisite'>
		<input type='hidden' name='action' value='config_global_submit'>
<div class='config site-global'>
	<h2>Site Info</h2>
		<label>Main Title</label><input type='text' name='title' value='<?=$extra['title']?>'>
		<label>Secondary Title</label><input type='text' name='secondary_title' value='<?=$extra['secondary_title']?>'>
		<label>Header Text</label><input type='text' name='header_text' value='<?=$extra['header_text']?>'>
		<label>Footer Text</label><input type='text' name='footer_text' value='<?=$extra['footer_text']?>'>
		<br>Forums on First Page, Forum 1, is the Main Forum<br>
			<? for ( $i = 1; $i <= 10; $i++ ) { ?>
			<select name="forum_no_<?=$i?>">
					<option value=''>Forum No. <?=$i?></option>
					<? foreach ( $rows as $row ) { ?>
						<option value="<?=$row['bo_table']?>" <?if($extra['forum_no_'.$i] == $row['bo_table']) echo "selected"?>><?=$row['bo_subject']?></option>
					<? } ?>
			</select>
			<? } ?>

		<br><br>

		<div class='config-img'>
			<label>Header Logo</label><br>
			<?if( $extra['header_logo'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['header_logo']?>" width=280px height=160px><br><?}?>
			<input type='file' name='header_logo'><br>
			<label>Logo Text</label><br>
			<input type='text' name='logo_text' value='<?=$extra['logo_text']?>'>
		</div>
		
		<div class='config-img'>	
			<label>Profile Photo</label><br>
			<?if( $extra['profile_img'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['profile_img']?>" width=280px height=160px><br><?}?>
			<input type='file' name='profile_img'><br>
			<label>Banner 1 Text 1</label><br>
			<input type='text' name='profile_text1' value='<?=$extra['profile_text1']?>'><br>
			<label>Banner 1 Text 2</label><br>
			<input type='text' name='profile_text2' value='<?=$extra['profile_text2']?>'>
		</div>
		
		<div class='config-img'>	
			<label>Banner 1</label><br>
			<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_1']?>" width=280px height=160px><br><?}?>
			<input type='file' name='banner_1'><br>
			<label>Banner 1 Text 1</label><br>
			<input type='text' name='banner1_text1' value='<?=$extra['banner1_text1']?>'><br>
			<label>Banner 1 Text 2</label><br>
			<input type='text' name='banner1_text2' value='<?=$extra['banner1_text2']?>'>
		</div>
		
		<div class='config-img'>			
			<label>Banner 2</label><br>
			<?if( $extra['banner_1'] ) {?><img src="<?=ms::url_site(etc::domain()).$extra['img_url'].$extra['banner_2']?>" width=280px height=160px><br><?}?>
			<input type='file' name='banner_2'><br>
			<label>Banner 2 Text 1</label><br>
			<input type='text' name='banner2_text1' value='<?=$extra['banner2_text1']?>'><br>
			<label>Banner 2 Text 2</label><br>
			<input type='text' name='banner2_text2' value='<?=$extra['banner2_text2']?>'>
		</div><br>
		

		<br>
		<h2>Additional Settings</h2>
		<label>Display Sidebar on</label>
			<input type="radio" name="theme_sidebar" value="left" <?if($extra['theme_sidebar'] == 'left') echo "checked"?>><span>Left</span>
			<input type="radio" name="theme_sidebar" value="right" <?if(!$extra['theme_sidebar'] || $extra['theme_sidebar'] == 'right') echo "checked"?>><span>Right</span><br>

		
		<input type='submit' value='submit'>

</div>
</form>