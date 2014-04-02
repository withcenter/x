<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<? if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?>
<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>
<? } ?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="gallery_1_mobile_list_with_image">
    <table width='100%' cellpadding=0 cellspacing=0 border=0>
    <?php for ($i=0; $i<count($list); $i++) {?>
	<tr valign='top'>
		
            <?php			
			$imgsrc = get_list_thumbnail( $bo_table , $list[$i]['wr_id'], 58, 40 );
			
			//if ( !$imgsrc ) $img = $latest_skin_url.'/img/no-image.png';
			//else $img = $imgsrc['src'];
			if( $imgsrc ) $img = $imgsrc['src'];
			else $img = $latest_skin_url.'/img/no-image.png';						
			?>
			<td width='59'>
				<div class='image_wrapper'>
					<a href="<?=$list[$i]['href']?>"><img src='<?=$img?>'/></a>
				</div>
			</td>			       
            <td>
				<div class='subject'><a href='<?=$list[$i]['href']?>'><?=cut_str(strip_tags($list[$i]['wr_subject']), 30, '...')?></div>
				<div class='contents_wrapper'><a href='<?=$list[$i]['href']?>'><?=cut_str(strip_tags($list[$i]['wr_content']), 35, '...')?></a></div>			
			</td>
				
             
	</tr>	
    <?php }  ?>
    <?php if(count($list) == 0) { //게시물이 없을 때  
			$img = $latest_skin_url.'/img/no-image.png';
			for ( $i=0; $i < 4; $i++ ) {?>
			<tr valign='top'>
				<td width='59'>
					<div class='image_wrapper'>
						<a href="<?=$list[$i]['href']?>"><img src='<?=$img?>'/></a>
					</div>
				</td>			       
				<td>
					<div class='subject'><a href='<?=G5_BBS_URL?>/write.php?bo_table=<?=$bo_table?>'>글을 등록해 주세요.</div>
					<div class='contents_wrapper'><a href='<?=G5_BBS_URL?>/write.php?bo_table=<?=$bo_table?>'>글을 등록해 주세요,</a></div>			
				</td>
			</tr>
			<? }?>
    <?php }  ?>
    </table>    
</div>



<!--[if IE]>
	<style>
		.gallery_1_mobile_list_with_image .list_title{
			margin-bottom:10px;
		}
		
		.gallery_1_mobile_list_with_image td{
			padding-top:0;	
		}
	</style>
<![endif]-->