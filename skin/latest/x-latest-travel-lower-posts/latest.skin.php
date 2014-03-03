<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="travel_lower_post">
    <div class='travel_lower_post_title'>
		<?if( $options ) echo "<img class='icon' src='".$options."'/>";?>
		<span class='board_subject'><?php echo cut_str( $bo_subject, 20, "..." );?></span>
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">MORE</a>
	</div>
	<div class='travel_lower_items'>
    <?php for ($i=0; $i<count($list); $i++) { 
		if( $i+1 == count($list) ) $nomargin = 'no-margin';
		else $nomargin = null;
	?>     
		<div class='item <?=$nomargin?>'>
            <?php                        
				if( !$list[$i]['comment_cnt'] ) $comments = 0;
				else $comments = $list[$i]['comment_cnt'];							
            ?>
			<div class='subject'>
			<img class='bullet' src='<?=$latest_skin_url?>/img/arrow-bullet.png' />
			<a href='<?=$list[$i]['href']?>'><?=$list[$i]['subject']?></a>
			<div class='comments'>[<?=$comments?>]</div>
			</div>			
		</div>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <div>게시물이 없습니다.</div>
    <?php }  ?>
	</div>   
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->