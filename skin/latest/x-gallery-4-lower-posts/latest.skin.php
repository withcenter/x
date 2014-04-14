<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<?add_stylesheet('<link rel="stylesheet" href='.$latest_skin_url.'/style.css">', 0);?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="gallery_4_bottom_post">
    <div class="title">				
		<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'><?php echo $bo_subject; ?></a>				
	</div>	
    <div class='item_wrapper'>
    <?php for ($i=0; $i<count($list); $i++) {			
	?>                  
            <div class='subject'>
				<a href="<?=$list[$i]['href']?>"><?=$list[$i]['subject']?></a>
			</div>        
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
		<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a></div>
		<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></div>
		<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3' style='color: #cc4235; font-weight: bold;'>커뮤니타 사이트 만들기</a></div>
		<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a></div>
		<div class='subject'><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=1'>(모바일)홈페이지, 스마트폰 앱</a></div>
    <?php }  ?>
    </div>
    <div style='clear:both'></div>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->