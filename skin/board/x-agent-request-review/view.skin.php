<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<?php
	$website_item = null;
	if ( $view['wr_6'] == 'company' ) $website_item =  '회사/업체/상품소개';
	else if ( $view['wr_6'] == 'community' ) $website_item =  '커뮤니티(카페)';
	else if ( $view['wr_6'] == 'shopping' ) $website_item =  '쇼핑몰';
	else $website_item =  '선택 없음';
?>
<div class='application-view'>
<div class='title'>
	<span><?=$view['wr_name']?></span>님의 제작요청사항 입니다.
</div>

 <div class='top-button'>
    <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn_b01">수정</a><?php } ?>
    <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a><?php } ?>       
     <a href="<?php echo $list_href ?>" class="btn_b01">목록</a>
 </div>
 <div style='clear:both;'></div>
 
<table class='application-view-table' cellpadding=0 cellspacing=0 width='100%'>
	<tr>
		<td width='120'><span class='sub-title'>웹사이트 종류</span></td>
		<td><?=$website_item?></td>
		<td width='120'><span class='sub-title'>템플릿 종류</span></td>
		<td><?=$view['wr_7']?></td>
	</tr>
	<tr>
		<td width='140'><span class='sub-title'>회사/단체/신청자</span></td>
		<td><?=$view['wr_1']?></td>
		<td width='140'><span class='sub-title'>작성자 이름</span></td>
		<td><?=$view['wr_name']?></td>
	</tr>
	<tr>
		<td width='140'><span class='sub-title'>주소</span></td>
		<td colspan=3><?=$view['wr_2']?></td>
	</tr>
	<tr>
		<td width='140'><span class='sub-title'>유선 전화</span></td>
		<td><?=$view['wr_4']?></td>
		<td width='140'><span class='sub-title'>휴대 전화</span></td>
		<td><?=$view['wr_5']?></td>
	</tr>
	<tr>
		<td width='140'><span class='sub-title'>이메일</span></td>
		<td><?=$view['wr_link1']?></td>
		<td width='140'><span class='sub-title'>현재 웹사이트 주소</span></td>
		<td><?=$view['wr_link2']?></td>
	</tr>
	<tr>
		<td width='140'><span class='sub-title'>예상제작기간</span></td>
		<td><?=$view['wr_8']?></td>
		<td width='140'><span class='sub-title'>신청 도메인</span></td>
		<td><?=$view['wr_9']?></td>
	</tr>
	<tr>
		<td colspan=4><span class='sub-title'>기타 요청사항</span></td>
	</tr>
	<tr>
		<td colspan=4><textarea><?=$view['wr_content']?></textarea></td>
	</tr>
</table>
</div>
 <?php
   // 코멘트 입출력
   include_once('./view_comment.php');
 ?>
 
<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->