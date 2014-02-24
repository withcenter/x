<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">
<?
$count = 0;
foreach( $list as $l ){	
		if( $temp_wr_id == $l['wr_id'] ) continue;
		$images[] = get_list_thumbnail($board['bo_table'], $l['wr_id'], 243, 137);				
		$temp_wr_id = $l['wr_id'];
		if( !$images[$count] ){
			$images[$count]['src'] = $board_skin_url.'/img/no-image.png';
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
	<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
	<div id="bo_list_total">
		<span>Total <?php echo number_format($total_count) ?>건</span>
		<?php echo $page ?> 페이지
	</div>
		<?if( ms::admin() ){?>
			<div class="travel-write">		
				<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn_b01">목록</a><?php } ?>
				<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>		
			</div>
		<?}?>
        <table width='750px;' cellpadding=0 cellspacing=0>        
        <?php
        for ($i=0; $i<count($list); $i+=3) {	
			if ( $list[$i]['wr_comment'] ) $no_of_comment = "<b>코멘트</b>(".$list[$i]['wr_comment'].")";
			else $no_of_comment = null;
			
			if ( $list[$i]['wr_hit'] ) $no_of_view = "<b>조회수</b>(".number_format($list[$i]['wr_hit']).")";
			else $no_of_view = null;
			
        ?>
			<tr valign='top'>
				<td width='33%'>					
						<div class='travel_posts'>
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
							
							<? /*
							<div class='stars'>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
							</div>
							*/?>
							
						</div>
						<div class='post-content'>
							<a href ='<?=$list[$i]['href']?>'>
								<?=cut_str(strip_tags($list[$i]['wr_content']),200,"...")?>
							</a>
						</div>
						</div>
				</td>
				<?if ($list[$i+1]){?>
				<td>
					<div class='travel_posts'>
						<div class='post-image'>
							<a href ='<?=$list[$i+1]['href']?>'>
								<img src = '<?=$images[$i+1]['src']?>' />
							</a>
						</div>
						<div class='post-subject'>
							<a href ='<?=$list[$i+1]['href']?>'>
								<?=conv_subject($list[$i+1]['wr_subject'],10,"...")?><span class='view-guide'>VIEW GUIDE</span>
							</a>
						</div>
						<div class='user-review'>User Review (<?=$list[$i+1]['wr_comment']?>)
							<div class='stars'>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
							</div>
						</div>
						<div class='post-content'>
							<a href ='<?=$list[$i+1]['href']?>'>
								<?=cut_str(strip_tags($list[$i+1]['wr_content']),200,"...")?>
							</a>
						</div>
					</div>
				</td>
				<?}?>
				<?if ($list[$i+2]){?>
				<td>
					<div class='travel_posts'>
						<div class='post-image'>
							<a href ='<?=$list[$i+2]['href']?>'>
								<img src = '<?=$images[$i+2]['src']?>' />
							</a>
						</div>
						<div class='post-subject'>
							<a href ='<?=$list[$i+2]['href']?>'>
								<?=conv_subject($list[$i+2]['wr_subject'],10,"...")?><span class='view-guide'>VIEW GUIDE</span>
							</a>
						</div>
						<div class='user-review'>User Review (<?=$list[$i+2]['wr_comment']?>)
							<div class='stars'>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
							</div>
						</div>
						<div class='post-content'>
							<a href ='<?=$list[$i+2]['href']?>'>
								<?=cut_str(strip_tags($list[$i+2]['wr_content']),200,"...")?>
							</a>
						</div>
					</div>
				</td>
				<?}?>
			</tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>        
        </table>
		<?if( ms::admin() ){?>
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
</div>

<!-- } 게시판 목록 끝 -->
