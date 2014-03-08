<?
include_once("_common.php");

if (!trim($bo_table)) exit;

if ($wr_id and $w!="r")
{
    $sql = "select * from $g5[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$bf_no'";
    $row = sql_fetch($sql);

    @unlink(G5_DATA_PATH."/file/$bo_table/$row[bf_file]");

    $sql = "delete from $g5[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$bf_no'";
    $qry = sql_query($sql);
}
else
{
    $sql = "select * from guploader where bo_table = '$bo_table' and bf_no = '$bf_no' and mb_id = '$member[mb_id]' and bf_ip = '$_SERVER[REMOTE_ADDR]'";
    $row = sql_fetch($sql);

    @unlink(G5_DATA_PATH."/guploader/$row[bf_file]");

    $sql = "delete from guploader where bo_table = '$bo_table' and bf_no = '$bf_no' and mb_id = '$member[mb_id]' and bf_ip = '$_SERVER[REMOTE_ADDR]'";
    $qry = sql_query($sql);
}
?>