<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);

$visit_name = array('오늘', '어제', '최대', '전체');
?>
<div class='stats-container'>
	<div class='stats-title'>
		<img src="<?=$visit_skin_url?>/img/stat-icon.png"/>접속자 통계
	</div>
	<div class='stats-content'>
		<?for( $i=0; $i<=3; $i++) { ?>
			<div class='per-stats'><?=$visit_name[$i]?> <span class='stats-results'><?=number_format($visit[$i+1])?></span></div>
		<?}?>
	</div>
	<?php if ($is_admin == "super") {  ?><a class='view-more-stats' href="<?php echo G5_ADMIN_URL ?>/visit_list.php">VIEW MORE</a><?php } ?>
</div>

