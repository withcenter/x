<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="comm3_timed_list">
    <div class="timed_list_title">		
		<?if( $options ) echo "<img class='icon' src='".$options."'/>";?>
		<?php echo $bo_subject; ?>
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">자세히</a>
	</div>
    <ul>
	<?php 
	
		// 코멘트가 가장 많은 글 1개의 글번호를 가져온다.
			$most_commented_wr_id = array();
			foreach ( $list as $li ) {
				$most_commented_wr_id[$li['wr_id']] = $li['comment_cnt'];
				
			}
			arsort( $most_commented_wr_id );
			array_pop($most_commented_wr_id);
			array_pop($most_commented_wr_id);
			array_pop($most_commented_wr_id);
			array_pop($most_commented_wr_id);
			
		
		
	?>
	
	
    <?php for ($i=0; $i<count($list); $i++) {
			foreach ( $most_commented_wr_id as $key => $value ) {
				if ( $key == $list[$i]['wr_id'] ) $add_color = "style='color: #cc4235; font-weight: bold;'";
				else $add_color = null;
				
			}
	?>
        <li>
		
            <?php 			
            echo "<span class='subject'><img class='dot' src='$latest_skin_url/img/square-icon.png' /><a $add_color href=\"".$list[$i]['href']."\">".$list[$i]['subject']."</a></span>";
			
			if( !$list[$i]['comment_cnt'] ) $comment_count = "<span class='comment_count no-comment'>0</span>";
			else $comment_count = "<span class='comment_count'>".$list[$i]['comment_cnt']."</span>";
			
			echo "<div class='comment_and_time'>".$comment_count."<span class='time'>".$list[$i]['datetime2']."</span></div>";
             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
		<li><span class='subject'><img class='dot' src='<?=$latest_skin_url?>/img/square-icon.png' /><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a></span></li>
		<li><span class='subject'><img class='dot' src='<?=$latest_skin_url?>/img/square-icon.png' /><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></span></li>
		<li><span class='subject'><img class='dot' src='<?=$latest_skin_url?>/img/square-icon.png' /><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3' style='color: #cc4235; font-weight: bold;'>커뮤니타 사이트 만들기</a></span></li>
		<li><span class='subject'><img class='dot' src='<?=$latest_skin_url?>/img/square-icon.png' /><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a></span></li>
		<li><span class='subject'><img class='dot' src='<?=$latest_skin_url?>/img/square-icon.png' /><a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=1'>(모바일)홈페이지, 스마트폰 앱</a></span></li>
    <?php }  ?>
    </ul>
    <?/*<div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a></div>*/?>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->