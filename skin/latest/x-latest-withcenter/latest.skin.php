<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='withcenter_latest'>
	<div class='title'>
		<? if ( $options ) echo "<img class='x-latest-withcenter-icon' src='$options'/>"; ?>
		<a class='top-title' href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a>
		<a class='more_btn' href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><img src='<?=$latest_skin_url?>/img/more_btn.gif' /></a>
		<div style='clear:right;'></div>
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
			<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
            <?php
            echo "<a href=\"".$list[$i]['href']."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];

            if ($list[$i]['comment_cnt'])
                echo $list[$i]['comment_cnt'];

            echo "</a>";
			
             ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
</div>