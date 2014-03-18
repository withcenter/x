<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);

?>
<div class='stats-container'>
	<div class='stats-title'>
		<img src="<?=$visit_skin_url?>/img/stat-icon.png"/>접속자 통계
	</div>
	<div class='stats-content'>
		<div class='per-stats'>오늘 <span class='stats-results'><?php echo number_format($visit[1]) ?></span></div>
		<div class='per-stats'>어제 <span class='stats-results'><?php echo number_format($visit[2]) ?></span></div>
		<div class='per-stats'>최대 <span class='stats-results'><?php echo number_format($visit[3]) ?></span></div>
		<div class='per-stats'>전체 <span class='stats-results'><?php echo number_format($visit[4]) ?></span></div>
		<?php if ($is_admin == "super") {  ?><a href="<?php echo G5_ADMIN_URL ?>/visit_list.php">상세보기</a><?php } ?>
	</div>
</div>

