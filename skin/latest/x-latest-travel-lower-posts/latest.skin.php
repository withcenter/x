<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="travel_lower_post">
    <div class='travel_lower_post_title'>
		<?if( $options ) echo "<img class='icon' src='".$options."'/>";?>
		<?php echo $bo_subject; ?>
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">MORE</a>
	</div>
	<div class='travel_lower_items'>
    <?php for ($i=0; $i<count($list); $i++) { 
		if( $i+1 == count($list) ) $nomargin = 'no-margin';
		else $nomargin = null;
	?>     
		<div class='item <?=$nomargin?>'>
            <?php            
            //echo "<a href=\"".$list[$i]['href']."\">";
            ?>
			<div class='subject'>
			<img class='bullet' src='<?=$latest_skin_url?>/img/arrow-bullet.png' />
			<?=$list[$i]['subject']?>			
			<?if (isset($list[$i]['icon_new'])) echo "<img class='new' src='".$latest_skin_url."/img/icon_new.gif'/>";?>
			</div>
			<?
				if( !$list[$i]['comment_cnt'] ) $comments = 0;
				else $comments = $list[$i]['comment_cnt'];
				
				$datetime = str_replace("-","/",$list[$i]['datetime']);
				
				$author = $list[$i]['name'];
			?>
			<div class='other-info'>
				<span><?=$datetime?></span>
				<span class='separator'>|</span>
				<span>Comments: <?=$comments?></span>
				<span class='separator'>|</span>
				<span>Author: <?=$author?></span>
			</div>
		</div>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <div>게시물이 없습니다.</div>
    <?php }  ?>
	</div>   
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->