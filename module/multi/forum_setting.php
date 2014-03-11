<?php
//for editor_html
include_once(G5_EDITOR_LIB);
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
			
			/// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.hthvy4o49hmo
			$up['bo_mobile_skin']				= $in['bo_skin']; /** for multisite, bo_skin and bo_mobile_skin will have same value which means PC version and Mobile version uses same skin. */ /// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.hthvy4o49hmo
			$up['bo_mobile_page_rows']	= $bo_page_rows;
			$up['bo_admin']						= $in['bo_admin']?$in['bo_admin'] : $member['mb_id'];
			$up['bo_use_category']			= $in['bo_use_category']?$in['bo_use_category'] : 0;
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
					if ( ms::meta('menu_'.$i) == $in['bo_table'] ) {
						$op['submenu_'.$i] = $in['bo_category_list'];
						ms::update($op);
					}
				}
			}
		
		if ( db::update( $g5['board_table'], $up, array('bo_table' => $in['bo_table']) ) ) $message = '수정 되었습니다.';
		else $message = '수정에 실패 하였습니다.';
		
		echo "<div class='message'>$message</div>";
	}
	
	
	$row = db::row("SELECT * FROM $g5[board_table] WHERE bo_table='$in[bo_table]'");
	$board = &$row;
	

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
		$x_dirs = file::getDirs(x::dir().'/skin/board');
		
		$select = "<select name='bo_skin'>
					  <option value=''>Select Skin</option>
					  <option value=''></option>
		";
		
		/* 기본 스킨은 반응형이 아니기 때문에 뺀다.
		foreach ( $dirs as $d ) {	
			if ( $d == $row['bo_skin'] ) $selected = 'selected';
			else $selected = null;
			
			$select .= "<option value='$d' $selected>$d</option>";
		}
		*/
		
		foreach( $x_dirs  as $xd ) {
			$skin_dir = 'x/skin/board/'.$xd;
			if ( $skin_dir == $row['bo_skin'] ) $selected = 'selected';
			else $selected = null;
			$select .= "<option value='$skin_dir' $selected>$xd</option>";
		}
		$select .= "</select>";
		
		return $select;
	}
	
?>
<div class='forum_setting'>
	<form method='get'>
		
		<input type='hidden' name='module' value='<?=$module?>' />
		<input type='hidden' name='action' value='config_forum' />
		<input type='hidden' name='mode' value='forum_setting' />
		<input type='hidden' name='bo_table' value='<?=$in['bo_table']?>' />
		<input type='hidden' name='done' value=1 />
						
		<div class='wrapper'>
			<div class='title'>일반 설정</div>
			<div><span class='item'>게시판 아이디</span><?=$row['bo_table']?></div>
			<div><span class='item'>제목</span><?=text('bo_subject')?></div>
			<div><span class='item'>모바일 제목</span><?=text('bo_mobile_subject')?></div>
			
			<div>
				<span class='item'><?=ln("Skin", "스킨")?></span>
				<?=load_skin()?>
				<? include 'forum_setting_skin_list.php' ?>
			</div>
			
			<div><span class='item'>관리자</span><?=text('bo_admin')?></div>
			<input type='submit' value='업데이트' />
		</div>
		
		<div class='wrapper editor'>
			<div class='title'>게시판 상단</div>
			<?php echo editor_html("bo_content_head", $row['bo_content_head']); ?>
			<input type='submit' value='업데이트' />
		</div>
		<div class='wrapper editor'>
			<div class='title'>게시판 하단</div>
			<?php echo editor_html("bo_content_tail", $row['bo_content_tail']); ?>	
			<input type='submit' value='업데이트' />
		</div>	
		<div class='wrapper editor'>
			<div class='title'>모바일 게시판 상단</div>
			<?php echo editor_html("bo_mobile_content_head", $row['bo_mobile_content_head']); ?>
			<input type='submit' value='업데이트' />
		</div>
		<div class='wrapper editor'>
			<div class='title'>모바일 게시판 하단</div>
			<?php echo editor_html("bo_mobile_content_tail", $row['bo_mobile_content_tail']); ?>	
			<input type='submit' value='업데이트' />
		</div>		
		
		<div class='wrapper'>
			<div class='title'>분류</div>
			<div><span class='item'>분류 사용</span><?=checkbox('bo_use_category')?></div>
			<div><span class='item' title='분류는 |로 구분됩니다. 예) 분류1|분류2|분류3'>분류</span><?=text('bo_category_list')?> <span class='tip'>분류는|로 구분하여 등록. 예)분류1|분류2|분류3</span></div>
			<input type='submit' value='업데이트' />
		</div>
		
		<div class='wrapper'>
			<div class='title'>접근 레벨</div>
			<div><span class='item'>리스트</span><?=text('bo_list_level')?></div>
			<div><span class='item'>읽기</span><?=text('bo_read_level')?></div>
			<div><span class='item'>쓰기</span><?=text('bo_write_level')?></div>
			<div><span class='item'>답변</span><?=text('bo_reply_level')?></div>
			<div><span class='item'>코멘트</span><?=text('bo_comment_level')?></div>
			<div><span class='item'>업로드</span><?=text('bo_upload_level')?></div>
			<div><span class='item'>다운로드</span><?=text('bo_download_level')?></div>
			<div><span class='item'>HTML</span><?=text('bo_html_level')?></div>
			<div><span class='item'>링크</span><?=text('bo_link_level')?></div>
			<input type='submit' value='업데이트' />
		</div>
		
		<div class='wrapper'>
			<div class='title'>포인트</div>
			<div><span class='item'>읽기</span><?=text('bo_read_point')?></div>
			<div><span class='item'>쓰기</span><?=text('bo_write_point')?></div>
			<div><span class='item'>코멘트</span><?=text('bo_comment_point')?></div>
			<div><span class='item'>다운로드</span><?=text('bo_download_point')?></div>
			<input type='submit' value='업데이트' />
		</div>

		<div class='wrapper'>
			<div class='title'>목록 설정</div>
			<div><span class='item'>목록 보임</span><?=checkbox('bo_use_list_view')?></div>
			<div><span class='item'>파일 목록 보임</span><?=checkbox('bo_use_list_file')?></div>
			<div><span class='item'>제목 길이</span><?=text('bo_subject_len')?></div>
			<div><span class='item'>페이지 당 글 수</span><?=text('bo_page_rows')?></div>
			<input type='submit' value='업데이트' />
		</div>
		
		<div class='wrapper'>
			<div class='title'>기타</div>
			<div><span class='item'>비밀글사용</span><?=checkbox('bo_use_secret')?></div>
			<div><span class='item'>동적HTML편집기</span><?=checkbox('bo_use_dhtml_editor')?></div>
			<div><span class='item'>RSS 사용</span><?=checkbox('bo_use_rss_view')?></div>
			<div><span class='item'>추천사용</span><?=checkbox('bo_use_good')?></div>
			<div><span class='item'>비추천사용</span><?=checkbox('bo_use_nogood')?></div>
			<div><span class='item'>글쓴이사용</span><?=checkbox('bo_use_name')?></div>
			<div><span class='item'>서명사용</span><?=checkbox('bo_use_signature')?></div>
			<div><span class='item'>IP보이기</span><?=checkbox('bo_use_ip_view')?></div>
			<div><span class='item'>업로드사이즈</span><?=text('bo_upload_size')?></div>
			<div><span class='item'>이미지가로</span><?=text('bo_image_width')?></div>
			<div><span class='item'>Thumbnail가로</span><?=text('bo_gallery_width')?></div>
			<div><span class='item'>Thumbnail세로</span><?=text('bo_gallery_height')?></div>		
			<input type='submit' value='업데이트'/>
		</div>
		
		
		
		<div class='wrapper'>
			<div class='title'>여분 필드 설정</div>	
			 <?php for ($i=1; $i<=10; $i++) { ?>
				<div>
					<span class='item'>여분필드 <?php echo $i ?> 제목</span>
						<input type="text" name="bo_<?php echo $i ?>_subj" id="bo_<?php echo $i ?>_subj" value="<?php echo get_text($board['bo_'.$i.'_subj']) ?>" class="frm_input">
					<span class='item'>여분필드 <?php echo $i ?> 값</span>
						<input type="text" name="bo_<?php echo $i ?>" value="<?php echo get_text($board['bo_'.$i]) ?>" id="bo_<?php echo $i ?>" class="frm_input">
				</div>
			<?php } ?>
		
			<input type='submit' value='업데이트'/>
		</div>
		
		
	</form>
</div>