<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="latest-rwd-community-1">
	<div class='title'>
		<span class='board_subject'>
			<img src='<?=$options[icon]?>'/>
			<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" class="lt_title"><?php echo cut_str($bo_subject,'15','...') ?></a>
		</span>
		<span class='latest-more'>
			<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">+ 더보기</a>
		</span>
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) { ?>
        <li>
            <?php
			echo "<img src='".$latest_skin_url."/img/square-icon.png'>";
            echo "<a href=\"".$list[$i]['href']."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];

            echo "</a>";

            ?>
        </li>
    <?php } ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
		 <li>
			<img src='<?=$latest_skin_url?>/img/square-icon.png'>
            <a href="javascript:void(0)">현재 회원님께서는</a>
        </li>
		 <li>
			<img src='<?=$latest_skin_url?>/img/square-icon.png'>
            <a href="javascript:void(0)">필고 모바일테마를</a>
        </li>
		 <li>
			<img src='<?=$latest_skin_url?>/img/square-icon.png'>
            <a href="javascript:void(0)">사용하고 있습니다.</a>
        </li> 
		<li>
			<img src='<?=$latest_skin_url?>/img/square-icon.png'>
            <a href="javascript:void(0)">현재 게시판에 등록된</a>
        </li>
		<li>
			<img src='<?=$latest_skin_url?>/img/square-icon.png'>
            <a href="javascript:void(0)">글은 없습니다.</a>
        </li>
		<li>
			<img src='<?=$latest_skin_url?>/img/square-icon.png'>
            <a href="<?=url_site_config()?>">게시판 설정바로가기</a>
        </li>		
	<?php } ?>
    </ul>
</div>

