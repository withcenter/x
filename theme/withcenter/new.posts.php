<?php
$rows = db::rows("SELECT wr_id, bo_table FROM $g5[board_new_table] WHERE wr_id = wr_parent AND bo_table LIKE 'withcenter%' LIMIT 0, 6");
$q_tmp = array();
foreach ( $rows as $row ) {
	$q_tmp[$row['bo_table']][] = "wr_id = $row[wr_id]";
}

di ( $q_tmp );
foreach ( $q_tmp as $key => $value ) {
	echo $key;
}
?>
<div class='new-posts'>
	 <div class='title'>
		<img class='new-post-icon' src='<?=x::url_theme()?>/img/icon4.gif' />
		새로 등록된 글
	 </div>
</div>