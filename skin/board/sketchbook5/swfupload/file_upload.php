<?
include_once("_common.php");

if ($wr_id and $w!="r")
    $board_file_path = G5_DATA_PATH."/file/$bo_table";
else
    $board_file_path = G5_DATA_PATH."/guploader";


// 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
@mkdir("$board_file_path", 0707);
@chmod("$board_file_path", 0707);

$upload   = array();
$tmp_file = $_FILES['Filedata']['tmp_name'];
$filename = $_FILES['Filedata']['name'];
$filesize = $_FILES['Filedata']['size'];

if (!is_uploaded_file($tmp_file)) exit;

// 파일명 charset
if (strtolower(str_replace("-", "", $g5[charset])) == "euckr") {
    $tmp_name = @iconv("utf-8", "cp949", $filename);
    if (!$tmp_name)
        $tmp_name = @mb_convert_encoding($str, "cp949", "utf-8");  
    if (!$tmp_name)
        exit;
    $filename = $tmp_name;
}

$upload['source'] = $filename;
$upload['filesize'] = $filesize;
$timg = @getimagesize($tmp_file);

// 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
$filename = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)$/i", "$0-x", $filename);

// 접미사를 붙인 파일명
$upload['file'] = abs(ip2long($_SERVER['REMOTE_ADDR'])).'_'.substr(md5(uniqid(G5_SERVER_TIME)), 0, 8).'_'.str_replace('%', '', urlencode($filename)); 

$dest_file = "$board_file_path/$upload[file]";

// 업로드가 안된다면 에러메세지 출력하고 죽어버립니다.
$error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['Filedata']['error']);

// 올라간 파일의 퍼미션을 변경합니다.
chmod($dest_file, 0606);

$bf_no = 0;

if ($wr_id and $w!="r") {
    $sql = "select max(bf_no) as bf_no from $g5[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id'";
    $row = sql_fetch($sql);
    if ($row[bf_no] >= 0)
        $bf_no = $row[bf_no] + 1;

    $sql = " insert into $g5[board_file_table]
                set bo_table = '$bo_table'
                    ,wr_id = '$wr_id'
                    ,bf_no = '$bf_no'
                    ,bf_source = '$upload[source]'
                    ,bf_file = '$upload[file]'
                    ,bf_filesize = '$upload[filesize]'
                    ,bf_width = '$timg[0]'
                    ,bf_height = '$timg[1]'
                    ,bf_type = '$timg[2]'
                    ,bf_datetime = '".G5_TIME_YMDHIS."'";
    $qry = sql_query($sql);
} else {
    $sql = "select max(bf_no) as bf_no from guploader where bo_table = '$bo_table' and mb_id = '$mb_id' and bf_ip = '$_SERVER[REMOTE_ADDR]' ";
    $row = sql_fetch($sql, false);
    if ($row[bf_no] >= 0)
        $bf_no = $row[bf_no] + 1;

    $sql = " insert into guploader
                set bo_table = '$bo_table'
                    ,bf_no = '$bf_no'
                    ,mb_id = '$mb_id'
                    ,bf_source = '$upload[source]'
                    ,bf_file = '$upload[file]'
                    ,bf_filesize = '$upload[filesize]'
                    ,bf_width = '$timg[0]'
                    ,bf_height = '$timg[1]'
                    ,bf_type = '$timg[2]'
                    ,bf_datetime = '".G5_TIME_YMDHIS."'
                    ,bf_ip = '$_SERVER[REMOTE_ADDR]'";
    $qry = sql_query($sql, false);

}
?>