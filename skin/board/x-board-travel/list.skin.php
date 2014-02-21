<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
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
    <div id="travel_theme_table">
        <table width='750px;' cellpadding=0 cellspacing=0>           
        <?php
        for ($i=0; $i<count($list); $i+=3) {		
        ?>
			<tr valign='top'>
				<td width='243px'>
					<a href ='<?=$list[$i]['href']?>'>
						<div class='travel_posts'>
						<div class='post-image'><img src = '<?=$images[$i]['src']?>' /></div>
						<div class='post-subject'><?=conv_subject($list[$i]['wr_subject'],10,"...")?><span class='view-guide'>VIEW GUIDE</span></div>
						<div class='user-review'>User Review (<?=$list[$i]['wr_comment']?>)
							<div class='stars'>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
							</div>
						</div>
						<div class='post-content'><?=cut_str(strip_tags($list[$i]['wr_content']),200,"...")?></div>
						</div>
					</a>
				</td width='243px'>
				<?if ($list[$i+1]){?>
				<td>
					<a href ='<?=$list[$i+1]['href']?>'>
						<div class='travel_posts'>
						<div class='post-image'><img src = '<?=$images[$i+1]['src']?>' /></div>
						<div class='post-subject'><?=conv_subject($list[$i+1]['wr_subject'],10,"...")?><span class='view-guide'>VIEW GUIDE</span></div>
						<div class='user-review'>User Review (<?=$list[$i+1]['wr_comment']?>)
							<div class='stars'>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
							</div>
						</div>
						<div class='post-content'><?=cut_str(strip_tags($list[$i+1]['wr_content']),200,"...")?></div>
						</div>
					</a>
				</td>
				<?}?>
				<?if ($list[$i+2]){?>
				<td width='243px'>
					<a href ='<?=$list[$i+2]['href']?>'>
						<div class='travel_posts no-margin'>
						<div class='post-image'><img src = '<?=$images[$i+2]['src']?>' /></div>
						<div class='post-subject'><?=conv_subject($list[$i+2]['wr_subject'],10,"...")?><span class='view-guide'>VIEW GUIDE</span></div>
						<div class='user-review'>User Review (<?=$list[$i+2]['wr_comment']?>)
							<div class='stars'>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
								<img src='<?=$board_skin_url?>/img/star.png'/>
							</div>
						</div>
						<div class='post-content'><?=cut_str(strip_tags($list[$i+2]['wr_content']),200,"...")?></div>
						</div>
					</a>
				</td>
				<?}?>
			</tr>
        <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>        
        </table>
    </div>   
</div>

<!-- } 게시판 목록 끝 -->
