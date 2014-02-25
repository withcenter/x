<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if ( $options ) $icon_image = "<img class='icon-image' src='$options' />";
else $icon_image = null;
?>
<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='right_travel_latest'>
	<div class='title'>
		<?=$icon_image?>
		<a class='top-title' style='font-size: 1em;' href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a>				
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
			$subject = "<span class='subject'><img class='dot' src='$latest_skin_url/img/dot.gif' />".conv_subject($list[$i]['wr_subject'],15,'...').":</span>";
			$content = "<span class='content'>".cut_str(strip_tags($list[$i]['wr_content']),70,'...')."</span>";			
			
            echo "<div class='text-container'><a href=\"".$list[$i]['href']."\">";
            echo $subject.$content;

            echo "</a></div>";
			
             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
</div>