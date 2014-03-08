<?php
include_once('./_common.php');
// if(!$board['bo_table'] || !$_GET['type']) goto_url($g4['path']);
$board_type = $board['bo_table'];
set_session("type_{$board_type}", $_GET['type']);
goto_url(G5_BBS_URL. '/board.php?bo_table=' . $board['bo_table']);
?>
