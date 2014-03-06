<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="travel_2_timed_list_with_image">
    <div class="title">
		<?if( $options ) echo "<img class='icon' src='".$options['icon']."'/>";?>
		<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'><?php echo $bo_subject; ?></a>
		<a class='more_button' href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'>자세히</a>
		<div style='clear:right;'></div>
	</div>
		<div class='travel_images_2_container'>
    <table cellpadding=0 cellspacing=0 >
    <?php for ($i=0; $i<count($list); $i++) {
		if( $i+1 == count($list) ){			
			$nopadding = 'no-padding';
		}
		else $nopadding = null;
	?>
	<tr valign='top'>
		
            <?php			
			$imgsrc = get_list_thumbnail( $bo_table , $list[$i]['wr_id'], 32, 32 );

			if( $imgsrc ) $img = "<img src='".$imgsrc['src']."'/>";
			else $img = "<div class='no-image'></div>";
			
			echo "<td class='$nopadding' width=40><div class='travel_2_image'><a href='".$list[$i]['href']."'>$img</a></div></td>";
			        
            echo "<td class='$nopadding' width=170><div class='travel_2_subject'><a href='".$list[$i]['href']."'>".$list[$i]['subject']."</a></div></td>";
						
             ?>	
	</tr>	
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  
	?>
		<tr valign='top'>
			<td class='$nopadding' width=40><div class='travel_2_image'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'><img src='<?=$latest_skin_url?>/img/no-image.png' /></a></div></td>      
            <td class='$nopadding' width=170><div class='travel_2_subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a></div></td>
		</tr>
		<tr valign='top'>
			<td class='$nopadding' width=40><div class='travel_2_image'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'><img src='<?=$latest_skin_url?>/img/no-image.png' /></a></div></td>      
            <td class='$nopadding' width=170><div class='travel_2_subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></div></td>
		</tr>
		<tr valign='top'>
			<td class='$nopadding' width=40><div class='travel_2_image'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'><img src='<?=$latest_skin_url?>/img/no-image.png' /></a></div></td>      
            <td class='$nopadding' width=170><div class='travel_2_subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a></div></td>
		</tr>
    <?php }  ?>
    </table>   
	</div>
</div>