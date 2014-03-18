<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);

$visit_name = array('오늘', '어제', '최대', '전체');
?>
<div class='visit-stats-title'>접속자 통계</div>
<? for( $i=0; $i<=3; $i++ ) { ?> <div class='per-stats-mobile'><?=$visit_name[$i]?><br><?=number_format($visit[$i+1])?></div> <?}?>
<div style='clear: left'></div>