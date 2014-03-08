<?
include_once("./_common.php");
if (!$is_member) exit;

$g5['title'] = "회원사진변경";
include_once(G5_PATH."/head.sub.php");
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>

<div id="memo_write" class="new_win mbskin">
    <h1 id="win_title">회원사진 변경</h1>


<form name="mb_photo" id="mb_photo" action="./member.photo_update.php" method="post" onsubmit="return fmember_submit(this);" enctype="multipart/form-data">
   <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>회원사진변경</caption>
        <tbody>
        <tr>
            <th scope="row">
				<?php
					$mb_dir = substr($member['mb_id'],0,2);
					$photo_path = G5_DATA_PATH.'/member/'.$mb_dir;
					$photo_file = $member['mb_id'].'_2.jpg';
					$photo_thumbs = thumbnail($photo_file, $photo_path , $photo_path , 60, 60, true);

	
					$thumb_data = G5_DATA_PATH.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2_60x60.jpg';
					$thumb_url = G5_DATA_URL.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2_60x60.jpg';

					if (file_exists($thumb_data)) {
						echo '<img src="'.$thumb_url .'" alt="">';
						echo '<input type="checkbox" id="del_mb_photo" name="del_mb_photo" value="1">삭제';
						}
				?>
            </th>
            <td>
                <input type="file" name="mb_photo" id="mb_photo"  value="<?php echo $me_recv_mb_id ?>"  required class="frm_input required" />
                <span class="frm_info">이미지 크기는 가로100픽셀 세로100픽셀 로 업로드해 주세요.</span>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="me_memo">주의</label></th>
            <td>확장자는 jpg만 가능합니다</td>
        </tr>

        </tbody>
        </table>
    </div>

    <div class="win_btn">
        <input type="submit" value="등록하기" id="btn_submit" accesskey="s"  class="btn_submit">
        <button type="button" onclick="window.close();">창닫기</button>
    </div>
    </form>
</div>

<script type="text/javascript">
function fmember_submit(f)
{

    return true;
}
</script>
<?
include_once(G5_PATH."/tail.sub.php");
?>