<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">

<div class="x-latest-forums-extended-2">
    <div class="title">
		<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>'><?=$bo_subject?></a>
		<span class='more-button'><a href="?page=template_main">자세히 <img src="<?=$latest_skin_url?>/img/more-button.png" /></a></span>
	</div>
    <ul>
		<?php
			for ($i=0; $i<count($list); $i++) {
				$count_comment = $list[$i]['wr_comment'];
				if ( $count_comment ) $count_comment = " ($count_comment)";
				else $count_comment = '';
		?>
        <li>
			<span class='content'><img src='<?=$latest_skin_url?>/img/bullet.png'/>	<a href='<?=$list[$i]['href']?>'><?=cut_str(get_text(strip_tags($list[$i]['wr_subject'])),"50","...")?><?=$count_comment?></a></span>            
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