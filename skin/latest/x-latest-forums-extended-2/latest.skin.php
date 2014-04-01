<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="x-latest-forums-extended-2">
    <div class="title">		
		<?php echo $bo_subject; ?>		
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {?>
        <li>
			<span class='content'><img src='<?=$latest_skin_url?>/img/bullet.png'/>	<a href='<?=$list[$i]['href']?>'><?=cut_str(get_text(strip_tags($list[$i]['wr_subject'])),"50","...")?></a></span>            
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
		<?php for ( $i=0; $i < 8; $i++ ) {?>
			<li>
				<span class='content'><img src='<?=$latest_skin_url?>/img/bullet.png'/>	<a href='<?=G5_BBS_URL?>/write.php?bo_table=<?=$bo_table?>'>글을 등록해 주세요.</a></span>            
			</li>
		<? }?>
    <?php }  ?>
    </ul>

</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->