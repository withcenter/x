<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);

?>

    <div id="visit">
       <div class='title'>접속자 통계</div>
		<div>오늘: <?php echo number_format($visit[1]) ?></div>
		<div>어제: <?php echo number_format($visit[2]) ?></div>
      <div>최대: <?php echo number_format($visit[3]) ?></div>
      <div>전체: <?php echo number_format($visit[4]) ?></div>
      <?php if ($is_admin == "super") {  ?><a href="<?php echo G5_ADMIN_URL ?>/visit_list.php">상세보기</a><?php } ?>
    </div>