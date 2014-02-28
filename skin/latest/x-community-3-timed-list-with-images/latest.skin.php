<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="comm3_timed_list_with_image">
    <div class="timed_list_title">
		<?if( $options ) echo "<img class='icon' src='".$options."'/>";?>
		<?php echo $bo_subject; ?>		
	</div>
    <table width='100%' cellpadding=0 cellspacing=0>
    <?php for ($i=0; $i<count($list); $i++) {?>
	<tr valign='top'>
		
            <?php			
			$imgsrc = get_list_thumbnail( $bo_table , $list[$i]['wr_id'], 38, 30 );
			
			//if ( !$imgsrc ) $img = $latest_skin_url.'/img/no-image.png';
			//else $img = $imgsrc['src'];
			if( $imgsrc ) $img = $imgsrc['src'];
			else $img = null;
			
			echo "<td width=40><div class='timed_list_image'><a href='".$list[$i]['href']."'><img src='$img'/></a></div></td>";
			        
            echo "<td width=240><div class='subject'><a href='".$list[$i]['href']."'>".$list[$i]['subject']."</a></div></td>";
			
			if( !$list[$i]['comment_cnt'] ) $comment_count = "<span class='comment_count no-comment'>0</span>";
			else $comment_count = "<span class='comment_count'>".strip_tags($list[$i]['comment_cnt'])."</span>";
			
			echo "<td><div class='comment_and_time'>".$comment_count."<br><span class='time'>".$list[$i]['datetime2']."</span></div></td>";
             ?>	
	</tr>	
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
		<tr valign='top'><td>게시물이 없습니다.</td></tr>
    <?php }  ?>
    </table>    
</div>