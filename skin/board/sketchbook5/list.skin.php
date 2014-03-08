<?php
include_once($board_skin_path.'/lib/common.lib.php');
$SKIN2 = $_SESSION["type_{$bo_table}"];
$SKIN = $board_skin_path."/list." .$SKIN2. ".skin.php";
if ($board['bo_4'] == "naver") { $write_pages = get_naver_paging($config[cf_write_pages], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page="); }
else { $write_pages = get_new_paging($config[cf_write_pages], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page="); }

 $gup_old = date("Y-m-d H:i:s", G5_SERVER_TIME - 86400);
    $sql = "select * from $g5[guploader_table] where bf_datetime <= '$gup_old'";
    $qry = sql_query($sql, false);
    while ($row = sql_fetch_array($qry)) {
        @unlink(G5_DATA_PATH."/guploader/$row[bf_file]");
    }
    sql_query("delete from $g5[guploader_table] where bf_datetime <= '$gup_old'", false);

?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css?<?php echo G5_TIME_YMD?>" />
<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/ie8.css?<?php echo G5_TIME_YMD?>" /><![endif]--> 
<link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/jquery-ui.css?<?php echo G5_TIME_YMD?>" />
<?php if($board[bo_2] == "black") { ?><link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/black.css?<?php echo G5_TIME_YMD?>" /><?php } ?>

<?php
if($_SESSION["type_{$bo_table}"]) { include_once( $board_skin_path."/list." .$SKIN2. ".skin.php"); 
} else if ($board[bo_1]) {
	include_once($board_skin_path . "/list.".$board[bo_1].".skin.php");
} else {
	include_once($board_skin_path . "/list.list.skin.php");
}
?>
	
	<div class="btm_mn clear">
		<div class="fl">
			<form name="fsearch" method="get" class="bd_srch_btm<?php if(stripslashes($stx))  echo " on"; ?>" >
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sop" value="and">
				<span class="btn_img itx_wrp">
					<!-- <input type="submit" value="검색" class="ico_16px search"> -->
					<button type="submit" onclick="jQuery(this).parents('form.bd_srch_btm').submit();return false" class="ico_16px search">Search</button>
					<label for="stx">검색</label>
					<!-- <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx"  class="bd_srch_btm_itx srch_itx frm_input required" size="15" maxlength="15"> -->
					<input type="text" name="stx" id="stx" class="bd_srch_btm_itx srch_itx" value="<?php echo stripslashes($stx) ?>" />
				</span>
				<span class="btn_img select">
					<select name="sfl" id="sfl">
						<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
						<option value="wr_related"<?php echo get_selected($sfl, 'wr_related'); ?>>태그</option>
						<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
						<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
						<option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
						<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
						<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
						<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
					</select>
				</span>
			</form>	
			
		</div><!-- fl -->
		
		 <?php if ($list_href || $write_href) { ?>
			<div class="fr">
				<? if ($admin_href) { ?><a class="btn_img" href="<?=$admin_href?>"><b class="ico_16px setup"></b> 관리자</a><? } ?>
				<?php if ($list_href) { ?><a class="btn_img" href="<?php echo $list_href ?>"><i class="ico_16px list"></i>목록</a><?php } ?>
				<?php if ($write_href) { ?><a class="btn_img" href="<?php echo $write_href ?>"><i class="ico_16px write"></i> 쓰기</a><?php } ?>
			</div>
		<?php } ?>
	</div><!-- btm_mn clear -->

<?php echo $write_pages;  ?>
		

	<p class="blind">Designed by sketchbooks.co.kr / sketchbook5 board skin</p>

		<div id="bd_font_install">
			<div id="install_ng2">
				<button type="button" class="tg_blur2"></button><button class="tg_close2">X</button>
				<h3>나눔글꼴 설치 안내</h3><br />
				<h4>이 PC에는 <b>나눔글꼴</b>이 설치되어 있지 않습니다.</h4>
				<p>이 사이트를 <b>나눔글꼴</b>로 보기 위해서는<br /><b>나눔글꼴</b>을 설치해야 합니다.</p>
				<a class="do btn_img" href="http://hangeul.naver.com/" target="_blank"><span class="tx_ico_chk">✔</span> 설치</a>
				<a class="btn_img no close" href="#">취소</a>
				<button type="button" class="tg_blur2"></button>
			</div>		
			<div class="fontcheckWrp">
				<div class="blind">
					<p id="fontcheck_ng3" style="font-family:'나눔고딕',NanumGothic,monospace,Verdana !important">Sketchbook5, 스케치북5</p>
					<p id="fontcheck_ng4" style="font-family:monospace,Verdana !important">Sketchbook5, 스케치북5</p>
				</div>
				<div class="blind">
					<p id="fontcheck_np1" style="font-family:'나눔손글씨 펜','Nanum Pen Script',np,monospace,Verdana !important">Sketchbook5, 스케치북5</p>
					<p id="fontcheck_np2" style="font-family:monospace,Verdana !important">Sketchbook5, 스케치북5</p>
				</div> 
			</div>
		</div>
	</div>
</div>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->


<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<script src="<?php echo $board_skin_url ?>/js/jquery-ui.min.js?20131003180322"></script> 
<script src="<?php echo $board_skin_url ?>/js/jquery.cookie.js?<?php echo G5_TIME_YMD?>"></script>
<script src="<?php echo $board_skin_url ?>/js/board.js?<?php echo G5_TIME_YMD?>"></script>
<script type="text/javascript" src="<?php echo $board_skin_url ?>/js/jquery.masonry.min.js?<?php echo G5_TIME_YMD?>"></script>

