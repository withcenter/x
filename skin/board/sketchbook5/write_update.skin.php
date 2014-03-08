<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// 업로드 업데이트

    $sql = "select * from guploader where bo_table = '$bo_table' and mb_id = '$member[mb_id]' and bf_ip = '$_SERVER[REMOTE_ADDR]' order by bf_no";
    $qry = sql_query($sql, false);
    for ($i=0; $row=sql_fetch_array($qry); $i++) {
        $source = G5_DATA_PATH."/guploader/$row[bf_file]";
        $dest = G5_DATA_PATH."/file/$bo_table/$row[bf_file]";
        @copy($source, $dest);
        @unlink($source);
        sql_query("insert into $g5[board_file_table]
                   set bo_table = '$bo_table'
                     , wr_id = '$wr_id'
                     , bf_no = '$i'
                     , bf_source = '$row[bf_source]'
                     , bf_file = '$row[bf_file]'
                     , bf_filesize = '$row[bf_filesize]'
                     , bf_width = '$row[bf_width]'
                     , bf_height = '$row[bf_height]'
                     , bf_type = '$row[bf_type]'
                     , bf_datetime = '$row[bf_datetime]'");

    }
    sql_query("delete from guploader where bo_table = '$bo_table' and mb_id = '$member[mb_id]' and bf_ip = '$_SERVER[REMOTE_ADDR]'", false);

//쓰레기파일 삭제
	$times = date('Y-m-d H:i:s', time()-60*60*3 );
    $sql3= "select * from guploader where bf_datetime < '$times' ";

    $qry3 = sql_query($sql3, false);
    while($row3=sql_fetch_array($qry3)){
		sql_query("delete from guploader where id = '$row3[id]'");
		$source2 = G5_DATA_PATH."/guploader/$row3[bf_file]";
		@unlink($source2);
	}

if ($w==''|| !$w=="u") { 
    $row = sql_fetch("select count(bf_file) as cnt from $g5[board_file_table] where bo_table='$bo_table' and wr_id='$wr_id'"); 
    sql_query("update $write_table set wr_file='$row[cnt]' where wr_id='$wr_id'"); 
} 


$sql_tag = " update $write_table set wr_related = '$wr_related' where wr_id = '$wr_id' ";
sql_query($sql_tag);

?>
