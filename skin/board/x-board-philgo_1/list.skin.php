<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css"> 
<script src='<?=$board_skin_url?>/board.js'></script>
<?
//di($list);exit;
$count2 = 0;
foreach( $list as $l ){	
		$count = 0;
		
		$sql = "SELECT bf_file, bf_content FROM ".$g5['board_file_table']." WHERE bo_table = '".$bo_table."' AND wr_id = ".$l['wr_id'];

		$row = db::rows($sql);
		if( $row[0] ){
			foreach( $row as $r ){
				$img = G5_URL."/data/file/".$bo_table."/".$row[$count]['bf_file'];
				$images[$count2][$count]['src'] = g::thumbnail_from_image_tag("<img src='".$img."'/>", $bo_table, 74, 74);
				$count++;
			}			
		}
		$editor_images[] = g::thumbnail_from_image_tag($l['wr_content'], $bo_table, 74, 74);
		if( $editor_images[$count2] ){
			$images[$count2][]['src'] = $editor_images[$count2];
		}
		$count2++;
}
//di($images);exit;
?>
    <div id="board_philgo_1">
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
	<?php
		if( ms::meta('theme') == 'travel_theme_1' && !ms::admin() ){}
		else {			
			if( $in['page'] > 0 ) $page = $in['page'];
			$number = $config['cf_write_pages'] * $page;
		?>
		<div class="travel-write">
			<div class='bo_subject'>
				<?=$board['bo_subject']?>
				<div class='pages'>
					No. <?=15 * $page?> / Page <?=$page?>
				</div>
			</div>
			<div class='buttons'>
			<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn_b01">목록</a><?php } ?>
			<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>
			</div>
			<div style='clear:both'></div>
		</div>
	<?}?>	
        <table width='750px;' cellpadding=0 cellspacing=0>           
        <?php
        for ($i=0; $i<count($list); $i++) {				
		if( $i+1 == count($list) ) $no_padding = "class = 'no-padding'";
		else $no_padding = null;
        ?>
			<tr class = 'post_list' valign='top'>
			<?if( $images[$i][0]['src'] ) {?>
				<td width ='76' <?=$no_padding?>>					
					<div class='post-image' number="<?=$i?>">
						<a href ='<?=$list[$i]['href']?>'><img src = '<?=$images[$i][0]['src']?>' /></a>
						<div class='num_of_pics'><a href ='<?=$list[$i]['href']?>'><span class='plus'>+</span><?=count($images[$i])?></a></div>						
						<div class='other-images <?=$i?>'>						
							<?						
							for($i2 = 1; $i2 < count($images[$i]); $i2++ ){?>							
								<a href ='<?=$list[$i]['href']?>'><img src = '<?=$images[$i][$i2]['src']?>' /></a>
							<?						
								}
							?>
							<div style='clear:both'></div>
						</div>
					</div>
				</td>
			<?
				$single_td = null;
				}
				else $single_td = "colspan = 2";
			?>
				<td <?=$no_padding?> <?=$single_td?>>
						<div class='text-info'>
						
							<?
								$post_subject = conv_subject($list[$i]['wr_subject'],30,"...");
								$post_sub_title = cut_str($list[$i]['wr_1'],20,"...");
								$post_content = cut_str(str_replace("&nbsp;"," ",strip_tags($list[$i]['wr_content'])),200,"...");
								$post_availability = cut_str($list[$i]['wr_2'],50,"...");
								$num_of_comments = $list[$i]['wr_comment'];								
								$num_of_views = $list[$i]['wr_hit'];
								$datetime = $list[$i]['datetime'];	
								//$author = cut_str($list[$i]['mb_id'],10,"...");
								$author = get_sideview($list[$i]['mb_id'],$list[$i]['wr_name'],$list[$i]['wr_email'], $list[$i]['wr_homepage']);
								
								if( empty($post_sub_title) ) $post_sub_title = null;
								if( empty($post_availability) ) $post_availability = null;
							?>
							<div class='post-subject'>
								<a href ='<?=$list[$i]['href']?>'><?=$post_subject?> (<?=$num_of_comments?>)</a>
								<div class='right-info'>
									<span class='author'><?=$author ?></span>
									<span class='num_of_views'><?=$num_of_views?></span>
									<span class='date_time'><?=$datetime?></span>
								</div>
							</div>
							<div class='post-content'><a href ='<?=$list[$i]['href']?>'><?=$post_content?></a></div>							
						</div>
				</td>					
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
			<?php
				if( ms::meta('theme') == 'travel_theme_1' && !ms::admin() ){}
				else {?>
				<?php if ($list_href || $write_href) { ?>
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
