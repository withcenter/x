<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<? if ( ! $GLOBALS[$latest_skin_url] ++ ) { ?>
<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>
<? } ?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="gallery_1_mobile_list_with_image">
    <table width='100%' cellpadding=0 cellspacing=0>
    <?php for ($i=0; $i<count($list); $i++) {?>
	<tr valign='top'>
		
            <?php			
			$imgsrc = get_list_thumbnail( $bo_table , $list[$i]['wr_id'], 58, 40 );
			
			//if ( !$imgsrc ) $img = $latest_skin_url.'/img/no-image.png';
			//else $img = $imgsrc['src'];
			if( $imgsrc ) $img = $imgsrc['src'];
			else $img = $latest_skin_url.'/img/no-image.png';
			
			
			echo "<td width=59'><div class='image_wrapper'><a href='".$list[$i]['href']."'><img src='$img'/></a></div></td>";
			        
            echo "<td>					
					<div class='contents_wrapper'><a href='".$list[$i]['href']."'>".cut_str(strip_tags($list[$i]['wr_content']), 120, '...')."</a></div>			
				</td>";
				
             ?>	
	</tr>	
    <?php }  ?>
    <?php if(count($list) == 0) { //게시물이 없을 때  ?>
		<tr>
			<td width=40><div class='image_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'><img src='<?=$latest_skin_url?>/img/no-image.png'/></a></div></td>
			 <td width=240>
				<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a></div>
				<div class='contents_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a></div>
			 </td>	
			
		</tr>
		<tr>
			<td width=40><div class='image_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'><img src='<?=$latest_skin_url?>/img/no-image.png'/></a></div></td>
			 <td width=240>
				<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></div>
				<div class='contents_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></div>
			</td>	
			
		</tr>
		<tr>
			<td width=40><div class='image_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3'><img src='<?=$latest_skin_url?>/img/no-image.png'/></a></div></td>
			 <td width=240>
				<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3'>커뮤니티 사이트 만들기</a></div>
				<div class='contents_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3'>커뮤니티 사이트 만들기</a></div>
			</td>	
			
		</tr>
		<tr>
			<td width=40><div class='image_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'><img src='<?=$latest_skin_url?>/img/no-image.png'/></a></div></td>
			 <td width=240>
				<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a></div>
				<div class='contents_wrapper'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a></div>
			</td>	
			
		</tr>
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