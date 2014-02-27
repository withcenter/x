<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="comm3_timed_list_with_image">
    <div class="timed_list_title">		
		<?php echo $bo_subject; ?>
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">more</a>
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {?>
        <li>
		
            <?php
            echo "<a href=\"".$list[$i]['href']."\">";
			
			$imgsrc = get_list_thumbnail( $bo_table , $list[$i]['wr_id'], 32, 32 );
			
			if ( !$imgsrc ) $img = $latest_skin_url.'/img/no-image.png';
			else $img = $imgsrc['src'];
			
			echo "<span class='timed_list_image'><img src='$img'/></span>";
			
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];
			if( !$list[$i]['comment_cnt'] ) $comment_count = "<span class='comment_count no-comment'>0</span>";
			else $comment_count = "<span class='comment_count'>".strip_tags($list[$i]['comment_cnt'])."</span>";
			
			echo "<div class='comment_and_time'>".$comment_count."<br><span class='time'>".$list[$i]['datetime2']."</span></div>";

            echo "</a>";

             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <?/*<div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a></div>*/?>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->