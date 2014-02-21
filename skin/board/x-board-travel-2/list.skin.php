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
        <table width='750px;' cellpadding=0 cellspacing=0>           
        <?php
        for ($i=0; $i<count($list); $i++) {		
		if( $i == 0 ) $no_padding = "no-padding";
		else $no_padding = null;
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
    </div>   
</div>

<!-- } 게시판 목록 끝 -->
