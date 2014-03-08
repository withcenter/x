<?
include_once("./_common.php");

    $mb_dir = substr($member['mb_id'],0,2);

    // 회원 아이콘 삭제
    if ($del_mb_photo) {
        @unlink(G5_DATA_PATH.'/member/'.$mb_dir.'/'.$member['mb_id'].'_2.jpg');
        @unlink(G5_DATA_PATH.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2.jpg');
		}
    // 아이콘 업로드
    if (is_uploaded_file($_FILES['mb_photo']['tmp_name'])) {
        if (!preg_match("/(\.jpg)$/i", $_FILES['mb_photo']['name'])) {
            alert($_FILES['mb_photo']['name'] . '은(는) jpg 파일이 아닙니다.');
        }

        if (preg_match("/(\.jpg)$/i", $_FILES['mb_photo']['name'])) {
            @mkdir(G5_DATA_PATH.'/member/'.$mb_dir, G5_DIR_PERMISSION);
            @chmod(G5_DATA_PATH.'/member/'.$mb_dir, G5_DIR_PERMISSION);

            $dest_path = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$member['mb_id'].'_2.jpg';

            move_uploaded_file($_FILES['mb_photo']['tmp_name'], $dest_path);
            chmod($dest_path, G5_FILE_PERMISSION);

            if (file_exists($dest_path)) {
                $size = getimagesize($dest_path);
                // 아이콘의 폭 또는 높이가 설정값 보다 크다면 이미 업로드 된 아이콘 삭제
                if ($size[0] > 601 || $size[1] > 601) {
                    @unlink($dest_path);
					 alert('가로세로 600 픽셀 보다 큽니다.\n\n 파일크기를 줄여주세요');
                }
            }
        }
	} else {
	alert('파일을 선택하세요');
	}

alert("회원사진이 등록 되었습니다","./member.photo.php");
?>