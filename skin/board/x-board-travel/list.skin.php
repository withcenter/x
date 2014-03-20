<?php

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">
<?
$count = 0;
$img_width = 313;
$img_height = 177;
foreach( $list as $l ){	
		if( $temp_wr_id == $l['wr_id'] ) continue;
		$images[] = get_list_thumbnail($board['bo_table'], $l['wr_id'], $img_width, $img_height);				
		$temp_wr_id = $l['wr_id'];
		if( !$images[$count] ){
			//$images[$count]['src'] = $board_skin_url.'/img/no-image.png';
			$img = '<img class="img_left" src="'.$board_skin_url.'/img/no-image.png"/>';
			$images[$count]['src'] = g::thumbnail_from_image_tag( $img, $bo_table, $img_width, $img_height);			
		}
		$count++;
}
?>
    <div id="travel_theme_board">
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
		<?
			if( meta('theme') == 'travel_theme_1' && !admin() ){}
			else {
		?>
			<div class="travel-write">		
				<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn_b01">목록</a><?php } ?>
				<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>		
			</div>
		<?}?>        
	<div class = 'board_wrapper'>
        <?php
		if( count($list) > 21 ) $list_count = 21;		
		else $list_count = count($list);
        for ( $i = 0; $i < $list_count; $i++ ) {	
			if ( $list[$i]['wr_comment'] ) $no_of_comment = "<b>코멘트</b>(".$list[$i]['wr_comment'].")";
			else $no_of_comment = null;
			
			if ( $list[$i]['wr_hit'] ) $no_of_view = "<b>조회수</b>(".number_format($list[$i]['wr_hit']).")";
			else $no_of_view = null;
			
        ?>			
		<div class='travel_posts'>
			<div class='inner'>
				<div class='post-image'>
					<a href ='<?=$list[$i]['href']?>'>
						<img src = '<?=$images[$i]['src']?>' />
					</a>
				</div>
				<div class='post-subject'>
					<a href ='<?=$list[$i]['href']?>'>
						<?=conv_subject($list[$i]['wr_subject'],10,"...")?>
					</a>
				</div>
				<div class='user-review'>
					<span class='view-guide'><?=$no_of_view?></span>&nbsp;&nbsp;<?=$no_of_comment?> 
				</div>
				<div class='post-content'>
					<a href ='<?=$list[$i]['href']?>'>
						<?=cut_str(strip_tags($list[$i]['wr_content']),200,"...")?>
					</a>
				</div>
			</div><!--/inner-->	
		</div><!--/travel_post-->	
        <?php } ?>
	</div><!--/board_wrapper-->
        <?php if (count($list) == 0) { echo '<td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.'; } ?>                
		<?if( admin() ){?>
			<?php if ($list_href || $is_checkbox || $write_href) { ?>
			<div class="lower-buttons">
				<?php if ($is_checkbox) { ?>
				<div class="btn_bo_adm">
					<input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">
					<input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value">
					<input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value">
				</div>
				<?php } ?>
				
			
			<?php
				if( meta('theme') == 'travel_theme_1' && admin() ){}
				else {
					if ($list_href || $write_href) { ?>
						<div class="btn_bo_user">
							<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn_b01">목록</a><?php } ?>
							<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>
						</div>
				<?php } 
				}?>				
			</div>
			<div style='clear:both;'></div>
			<?php } ?>
		<?}?>
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

<!-- } 게시판 목록 끝 -->
