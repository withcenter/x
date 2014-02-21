<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">  
<?
$count = 0;
foreach( $list as $l ){	
		if( $temp_wr_id == $l['wr_id'] ) continue;
		$images[] = get_list_thumbnail($board['bo_table'], $l['wr_id'], 146, 106);				
		$temp_wr_id = $l['wr_id'];
		if( !$images[$count] ){
			$images[$count]['src'] = $board_skin_url.'/img/no-image.png';
		}
		$count++;
}
?>
    <div id="travel_theme_board_2">
	<!------------------------------------------------------->
	<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">
	<!------------------------------------------------------->
	<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
	<div id="bo_list_total">
		<span>Total <?php echo number_format($total_count) ?>건</span>
		<?php echo $page ?> 페이지
	</div>
		<div class="travel-write">
			<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn_b01">목록</a><?php } ?>
			<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>
		</div>
        <table width='750px;' cellpadding=0 cellspacing=0>           
        <?php
        for ($i=0; $i<count($list); $i++) {		
		if( $i == 0 ) $no_padding = "no-padding";
		else $no_padding = ndivl;
        ?>
			<tr class = 'travel_posts' valign='top'>					
				<td width ='148px' class = '<?=$no_padding?>'>
					<a href ='<?=$list[$i]['href']?>'>
						<div class='post-image'><img src = '<?=$images[$i]['src']?>' /></div>
					</a>
				</td>
				<td class = '<?=$no_padding?>'>
					<a href ='<?=$list[$i]['href']?>'>
						<div class='text-info'>
							<?
								$post_subject = conv_subject($list[$i]['wr_subject'],20,"...");
								$post_sub_title = cut_str($list[$i]['wr_1'],20,"...");
								$post_content = cut_str(strip_tags($list[$i]['wr_content']),150,"...");
								$post_availability = cut_str($list[$i]['wr_2'],50,"...");
								
								if( $post_sub_title == '' ) $post_sub_title = 'No Subtitle';
								if( $post_availability == '' ) $post_availability = 'No Availability Inputted';
							?>
							<div class='post-subject'><?=$post_subject?></div>
							<div class='post-sub-title'><?=$post_sub_title?></div>
							<div class='post-content'><?=$post_content?></div>
							<div class='post-availability'><?=$post_availability?></div>
							<img src ='<?=$board_skin_url?>/img/arrow.png'/>						
						</div>
					</a>
				</td>					
			</tr>
				
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>        
        </table>
		<?php if ($list_href || $is_checkbox || $write_href) { ?>
			<div class="lower-buttons">
				<?php if ($is_checkbox) { ?>
				<div class="btn_bo_adm">
					<input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">
					<input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value">
					<input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value">
				</div>
				<?php } ?>

				<?php if ($list_href || $write_href) { ?>
				<div class="btn_bo_user">
					<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn_b01">목록</a><?php } ?>
					<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>
				</div>
				<?php } ?>
			</div>
			<div style='clear:both;'></div>
    <?php } ?>
	</form>		
    </div>
	<?php echo $write_pages;  ?>
	<fieldset id="bo_sch">
		<legend>게시물 검색</legend>

		<form name="fsearch" method="get">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="sca" value="<?php echo $sca ?>">
		<input type="hidden" name="sop" value="and">
		<label for="sfl" class="sound_only">검색대상</label>
		<select name="sfl" id="sfl">
			<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
			<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
			<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
			<option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
			<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
			<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
			<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
		</select>
		<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
		<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx"  class="frm_input required" size="15" maxlength="15">
		<input type="submit" value="검색" class="btn_submit">
		
		</form>
	</fieldset>	
</div>

<!-- } 게시판 목록 끝 -->
