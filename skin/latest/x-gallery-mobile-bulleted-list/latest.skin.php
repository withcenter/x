<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="gallery_bulleted_list">
    <div class="bulleted_list_title">		
		<?php echo $bo_subject; ?>		
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {?>
        <li>
			<img src='<?=$latest_skin_url?>/img/bullet.png'/>			
			<div class='content'><a href='<?=$list[$i]['href']?>'><?=cut_str(get_text(strip_tags($list[$i]['wr_subject'])),40,"...")?></a></div>            
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
		<? for ( $i=0; $i < 7; $i++ ) {?>
			 <li>
				<img src='<?=$latest_skin_url?>/img/bullet.png'/>			
				<div class='content'><a href='<?=G5_BBS_URL?>/write.php?bo_table=<?=$bo_table?>'>글을 등록해 주세요</a></div>            
			</li>
		<? }?>
    <?php }  ?>
    </ul>
    <?/*<div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a></div>*/?>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->