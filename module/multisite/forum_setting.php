<?php
	if ( ! ms::admin() ) {
		echo "You are not admin";
		return;
	}
	if ( $in['done'] ) {
			$up = array();
			$up = $in;
			unset($up['module']);
			unset($up['action']);
			unset($up['mode']);
			unset($up['done']);
			unset($up['bo_table']);
			$up['bo_use_category'] = $in['bo_use_category']?$in['bo_use_category'] : 0;
			$up['bo_use_list_view'] = $in['bo_use_list_view']?$in['bo_use_list_view'] : 0;
			$up['bo_use_list_file'] = $in['bo_use_list_file']?$in['bo_use_list_file'] : 0;
			$up['bo_use_secret'] = $in['bo_use_secret']?$in['bo_use_secret'] : 0;
			$up['bo_use_dhtml_editor'] = $in['bo_use_dhtml_editor']?$in['bo_use_dhtml_editor'] : 0;
			$up['bo_use_rss_view'] = $in['bo_use_rss_view']?$in['bo_use_rss_view'] : 0;
			$up['bo_use_good'] = $in['bo_use_good']?$in['bo_use_good'] : 0;
			$up['bo_use_nogood'] = $in['bo_use_nogood']?$in['bo_use_nogood'] : 0;
			$up['bo_use_name'] = $in['bo_use_name']?$in['bo_use_name'] : 0;
			$up['bo_use_signature'] = $in['bo_use_signature']?$in['bo_use_signature'] : 0;
			$up['bo_use_ip_view'] = $in['bo_use_ip_view']?$in['bo_use_ip_view'] : 0;

			if ( $in['bo_category_list'] ) {
				for ( $i=1; $i <= 10; $i++ ) {
					if ( $extra['menu_'.$i] == $in['bo_table'] ) {
						$op['submenu_'.$i] = $in['bo_category_list'];
						ms::update($op);
					}
				}
			}
		
		if ( db::update( $g5['board_table'], $up, array('bo_table' => $in['bo_table']) ) ) $message = 'Successfully updated';
		else $message = 'Update failed';
		
		echo "<div class='message'>$message</div>";
	}
	
	
	$row = db::row("SELECT * FROM $g5[board_table] WHERE bo_table='$in[bo_table]'");
	
	/* 함수 모음 적절한 클래스에 적절한 함수를 생성할 필요가 있음 */
	function text( $name ) {
		global $row;
		
		return "<input type='text' name='$name' value='".$row[$name]."' />";
	}
	
	function checkbox ( $name ) {
		global $row;
		
		if ( $row[$name] ) $checked = 'checked=1';
		else $checked = null;
		
		return "<input type='checkbox' value=1 name='$name' $checked />";
	}
	
	function load_skin () {
		global $row;
		$dirs = file::getDirs(G5_SKIN_PATH.'/board');
		$select = "<select name='bo_skin'>
					  <option value=''>Select Skin</option>
					  <option value=''></option>
		";
					
		foreach ( $dirs as $d ) {	
			if ( $d == $row['bo_skin'] ) $selected = 'selected';
			else $selected = null;
			
			$select .= "<option value='$d' $selected>$d</option>";
		}
		$select .= "</select>";
		
		return $select;
	}
	
?>
<form class='forum_settig' method='get'>
	<input type='hidden' name='module' value='multisite' />
	<input type='hidden' name='action' value='config_forum' />
	<input type='hidden' name='mode' value='forum_setting' />
	<input type='hidden' name='bo_table' value='<?=$in['bo_table']?>' />
	<input type='hidden' name='done' value=1 />
	
	<fieldset>
		<legend>General</legend>
		<div><span class='item'>Board ID</span><?=$row['bo_table']?></div>
		<div><span class='item'>Subject</span><?=text('bo_subject')?></div>
		<div><span class='item'>SKIN</span><?=load_skin()?></div>
		<input type='submit' />
	</fieldset>
	
	<fieldset>
		<legend>Category</legend>
		<div><span class='item'>Use Category</span><?=checkbox('bo_use_category')?></div>
		<div><span class='item'>Category</span><?=text('bo_category_list')?></div>
		<input type='submit' />
	</fieldset>
	
	<fieldset>
		<legend>Level</legend>
		<div><span class='item'>List</span><?=text('bo_list_level')?></div>
		<div><span class='item'>Read</span><?=text('bo_read_level')?></div>
		<div><span class='item'>Write</span><?=text('bo_write_level')?></div>
		<div><span class='item'>Reply</span><?=text('bo_reply_level')?></div>
		<div><span class='item'>Comment</span><?=text('bo_comment_level')?></div>
		<div><span class='item'>Upload</span><?=text('bo_upload_level')?></div>
		<div><span class='item'>Download</span><?=text('bo_download_level')?></div>
		<div><span class='item'>Html</span><?=text('bo_html_level')?></div>
		<div><span class='item'>Link</span><?=text('bo_link_level')?></div>
		<input type='submit' />
	</fieldset>
	
	<fieldset>
		<legend>Point</legend>
		<div><span class='item'>Read</span><?=text('bo_read_point')?></div>
		<div><span class='item'>Write</span><?=text('bo_write_point')?></div>
		<div><span class='item'>Comment</span><?=text('bo_comment_point')?></div>
		<div><span class='item'>Download</span><?=text('bo_download_point')?></div>
		<input type='submit' />
	</fieldset>

	<fieldset>
		<legend>List</legend>
		<div><span class='item'>Use List View</span><?=checkbox('bo_use_list_view')?></div>
		<div><span class='item'>Use List File</span><?=checkbox('bo_use_list_file')?></div>
		<div><span class='item'>Subject Length</span><?=text('bo_subject_len')?></div>
		<div><span class='item'>Page Rows</span><?=text('bo_page_rows')?></div>
		<input type='submit' />
	</fieldset>
	<fieldset>
		<legend>ETC</legend>
		<div><span class='item'>Use Secret</span><?=checkbox('bo_use_secret')?></div>
		<div><span class='item'>Use Dhtml Editor</span><?=checkbox('bo_use_dhtml_editor')?></div>
		<div><span class='item'>Use RSS View</span><?=checkbox('bo_use_rss_view')?></div>
		<div><span class='item'>Use Good</span><?=checkbox('bo_use_good')?></div>
		<div><span class='item'>Use No Good</span><?=checkbox('bo_use_nogood')?></div>
		<div><span class='item'>Use Name</span><?=checkbox('bo_use_name')?></div>
		<div><span class='item'>Use Signature</span><?=checkbox('bo_use_signature')?></div>
		<div><span class='item'>Use IP View</span><?=checkbox('bo_use_ip_view')?></div>
		<div><span class='item'>Upload Size</span><?=text('bo_upload_size')?></div>
		<div><span class='item'>Image Width</span><?=text('bo_image_width')?></div>
		<div><span class='item'>Gallery Width</span><?=text('bo_gallery_width')?></div>
		<div><span class='item'>Gallery_Height</span><?=text('bo_gallery_height')?></div>		
		<input type='submit' />
	</fieldset>
</form>