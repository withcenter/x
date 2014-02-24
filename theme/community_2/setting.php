<table cellpadding=10px width='100%' class='image-config'>
	</tr>	
		<tr>
		<th colspan=3 align='center'><div class='title'>LOGO AND BANNERS<div></th>
	</tr>
	<tr valign='top' align='center'>
		<td>
			<div class='image-upload'>
				<div class='title'>HEADER LOGO</div>
				<?if( ms::meta('header_logo') ) {?><img src="<?=ms::meta('img_url').ms::meta('header_logo')?>" width=280px height=160px><br><?}?>
				<input type='file' name='header_logo'>
				<?if( ms::meta('header_logo') != '' ) { ?>
					<input type='hidden' name='header_logo_remove' value='n'>
					<input type='checkbox' name='header_logo_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>

		<td>
			<div class='image-upload'>
				<div class='title'>MAIN BANNER</div>
				<?if( ms::meta('com2banner_main') ) {?><img src="<?=ms::meta('img_url').ms::meta('com2banner_main')?>" width=280px height=160px><br><?}?>
				<input type='file' name='com2banner_main'>
				<?if( ms::meta('com2banner_main') != '' ) { ?>
					<input type='hidden' name='com2banner_main_remove' value='n'>
					<input type='checkbox' name='com2banner_main_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>

		<td>
			<div class='image-upload'>
				<div class='title'>BANNER ( Bottom )</div>
				<?if( ms::meta('com2banner_bottom') ) {?><img src="<?=ms::meta('img_url').ms::meta('com2banner_bottom')?>" width=280px height=160px><br><?}?>
				<input type='file' name='com2banner_bottom'>
				<?if( ms::meta('com2banner_bottom') != '' ) { ?>
					<input type='hidden' name='com2banner_bottom_remove' value='n'>
					<input type='checkbox' name='com2banner_bottom_remove' value='y'><span class='title-small'>Remove Image</span>
				<?}?>
			</div>
		</td>
	</tr>
</table>
<div class='title'>FORUM MENUS</div>
<div class="select-box-left">
	<div class='title-small'> Three Forum Menu on Top ( Beside Search ) </div>
<? for ( $i = 1; $i <= 3; $i++ ) { ?>
	<div>
		<span class='select-wrapper'><span class='inner'>
			<?php
			foreach ( $rows as $row ) {
				if ( ms::meta('forum_top_no_'.$i) && ms::meta('forum_top_no_'.$i) == $row['bo_table'] ) {
					$default_value =  $row['bo_subject'];
					break;
				}
				else $default_value = null;
			}
			
			echo $default_value ? $default_value : 'SELECT FORUM';
			?>
		</span></span>
		<span class='select-button'><span class='inner'>
			<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
		</span></span>
		<div class='drop-down-menu'>
			<div class='row' bo_table='' bo_subject='SELECT FORUM'>SELECT FORUM</div>
			<?php
				foreach ( $rows as $row ) {
					echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
				}
			?>
		</div>
		<input class='hidden-value' type='hidden' name='forum_top_no_<?=$i?>' value='<?=ms::meta('forum_top_no_'.$i)?>' />
	</div>
<? } ?>
</div>
<div class="select-box-left">
	<div class='title-small'> QnA Forum </div>
	<div>
		<span class='select-wrapper'><span class='inner'>
			<?php
			foreach ( $rows as $row ) {
				if ( ms::meta('qna_forum') && ms::meta('qna_forum') == $row['bo_table'] ) {
					$default_value =  $row['bo_subject'];
					break;
				}
				else $default_value = null;
			}
			
			echo $default_value ? $default_value : 'SELECT FORUM';
			?>
		</span></span>
		<span class='select-button'><span class='inner'>
			<img src='<?=x::url()?>/module/multisite/img/select_arrow.gif' />
		</span></span>
		<div class='drop-down-menu'>
			<div class='row' bo_table='' bo_subject='SELECT FORUM'>SELECT FORUM</div>
			<?php
				foreach ( $rows as $row ) {
					echo "<div class='row' bo_table='$row[bo_table]' bo_subject='$row[bo_subject]'>$row[bo_subject]</div>";
				}
			?>
		</div>
		<input class='hidden-value' type='hidden' name='qna_forum' value='<?=ms::meta('qna_forum')?>' />
	</div>
</div>