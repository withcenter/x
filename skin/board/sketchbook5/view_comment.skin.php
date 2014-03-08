<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<script>
// 글자수 제한
var char_min = parseInt(<?php echo $comment_min ?>); // 최소
var char_max = parseInt(<?php echo $comment_max ?>); // 최대
</script>
<?php if ($is_comment_write) {
    if($w == '')
        $w = 'c';
?>
<!-- 댓글 쓰기 시작 { -->
<aside id="bo_vc_w">
<div class="fdb_lst_wrp  ">
	<div id="c_<?php echo $comment_id?>" class="fdb_lst clear  ">		
		<div style="overflow:hidden;overflow:visible">
			<div style="*zoom:1;padding:0px 0px 0px 0px !important;">
				<div class="cmt_editor">
					<h2>댓글쓰기</h2>
					<form name="fviewcomment" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" method="post" autocomplete="off">
					<input type="hidden" name="w" value="<?php echo $w ?>" id="w">
					<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
					<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
					<input type="hidden" name="comment_id" value="<?php echo $c_id ?>" id="comment_id">
					<input type="hidden" name="sca" value="<?php echo $sca ?>">
					<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
					<input type="hidden" name="stx" value="<?php echo $stx ?>">
					<input type="hidden" name="spt" value="<?php echo $spt ?>">
					<input type="hidden" name="page" value="<?php echo $page ?>">
					<input type="hidden" name="is_good" value="">
						<div class="tbl_frm01 tbl_wrap">
							<table>
							<tbody>
							<?php if ($is_guest) { ?>
							<tr>
								<th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
								<td><input type="text" name="wr_name" id="wr_name"  required class="frm_input required" size="5" maxLength="20" value="<?php echo get_cookie("ck_sns_name"); ?>"></td>
							</tr>
							<tr>
								<th scope="row"><label for="wr_password">패스워드<strong class="sound_only">필수</strong></label></th>
								<td><input type="password" name="wr_password" id="wr_password"  required class="frm_input required" size="10" maxLength="20"></td>
							</tr>
							<?php } ?>
							<tr>
								<th scope="row"><label for="wr_secret">비밀글사용</label></th>
								<td><input type="checkbox" name="wr_secret" value="secret" id="wr_secret"></td>
							</tr>
							<?php if ($is_guest) { ?>
							<tr>
								<th scope="row">자동등록방지</th>
								<td><?php echo $captcha_html; ?></td>
							</tr>
							<?php } ?>
							<?php
							include(G5_SNS_PATH."/view_comment_write.sns.skin.php");
							?>
							<tr>
								<th scope="row">
									<?php
										$mb_dir = substr($member['mb_id'],0,2);
										$photo_path = G5_DATA_PATH.'/member/'.$mb_dir;
										$photo_file = G5_DATA_URL.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2_60x60.jpg';
										$photo_data = G5_DATA_PATH.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2_60x60.jpg';

										if (file_exists($photo_data)) {
											echo '<img src="'.$photo_file.'" alt="profile image" class="profile iePngFix">';
											} else {
												echo "<span class='profile no_img'>?</span>";
											}
											if($is_member) {
												echo "<div style='padding:5px 0 0 5px;'><a href='javascript:member_photo();' class='button clear'>변경</a></div>";
												}
									?>
								</th>
								<td>
									<?php if ($comment_min || $comment_max) { ?><strong id="char_cnt"><span id="char_count"></span>글자</strong><?php } ?>
									<textarea id="wr_content" name="wr_content" maxlength="10000" required class="required" title="내용"
									<?php if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?php } ?>><?php echo $c_wr_content;  ?></textarea>
									<?php if ($comment_min || $comment_max) { ?><script> check_byte('wr_content', 'char_count'); </script><?php } ?>
									<script>
									$("textarea#wr_content[maxlength]").live("keyup change", function() {
										var str = $(this).val()
										var mx = parseInt($(this).attr("maxlength"))
										if (str.length > mx) {
											$(this).val(str.substr(0, mx));
											return false;
										}
									});
									</script>
								</td>
							</tr>
							</tbody>
							</table>
						</div>

						<div class="btn_confirm">
							<input type="submit" id="btn_submit" class="btn_submit" value="댓글등록">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</aside>


<script>
function member_photo()
{
    window.open("<?=$board_skin_url?>/plugin/member_photo/member.photo.php", "회원사진변경", "width=500, height=310, scrollbars=auto, menubar=no");
}


var save_before = '';
var save_html = document.getElementById('bo_vc_w').innerHTML;

function good_and_write()
{
    var f = document.fviewcomment;
    if (fviewcomment_submit(f)) {
        f.is_good.value = 1;
        f.submit();
    } else {
        f.is_good.value = 0;
    }
}

function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자

    f.is_good.value = 0;

    var subject = "";
    var content = "";
    $.ajax({
        url: g5_bbs_url+"/ajax.filter.php",
        type: "POST",
        data: {
            "subject": "",
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        f.wr_content.focus();
        return false;
    }

    // 양쪽 공백 없애기
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("댓글은 "+char_min+"글자 이상 쓰셔야 합니다.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("댓글은 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("댓글을 입력하여 주십시오.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('이름이 입력되지 않았습니다.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('패스워드가 입력되지 않았습니다.');
            f.wr_password.focus();
            return false;
        }
    }

    <?php if($is_guest) echo chk_captcha_js();  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

function comment_box(comment_id, work)
{
    var el_id;
    // 댓글 아이디가 넘어오면 답변, 수정
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'bo_vc_w';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
            document.getElementById(save_before).innerHTML = '';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).innerHTML = save_html;
        // 댓글 수정
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
            if (document.getElementById('secret_comment_'+comment_id).value)
                document.getElementById('wr_secret').checked = true;
            else
                document.getElementById('wr_secret').checked = false;
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        if(save_before)
            $("#captcha_reload").trigger("click");

        save_before = el_id;
    }
}

function comment_delete()
{
    return confirm("이 댓글을 삭제하시겠습니까?");
}

comment_box('', 'c'); // 댓글 입력폼이 보이도록 처리하기위해서 추가 (root님)
</script>
<?php } ?>
<!-- } 댓글 쓰기 끝 -->

<!-- 댓글 시작 { -->
<!-- section id="bo_vc" -->
<section>
	<div class="fdb_tag">
		<a class="ui_font bubble" href="#" onclick="jQuery(this).parent().nextAll('ul').slideToggle();return false" title="댓글 보기">Comment <b>'<?php echo count($list)?>'</b></a>
	</div>
	<ul>
    <?php
    $cmt_amt = count($list);
    for ($i=0; $i<$cmt_amt; $i++) {
        $comment_id = $list[$i]['wr_id'];
        $cmt_depth = ""; // 댓글단계
        $cmt_depth = strlen($list[$i]['wr_comment_reply']) * 20;
        $comment = $list[$i]['content'];
	
		$mb_dir = substr($list[$i]['mb_id'],0,2);
		$photo_file = G5_DATA_PATH.'/member/'.$mb_dir.'/'.$list[$i]['mb_id'].'_2.jpg';


		$comment = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $comment);
        $cmt_sv = $cmt_amt - $i + 1; // 댓글 헤더 z-index 재설정 ie8 이하 사이드뷰 겹침 문제 해결
     ?>
		<li id="c_<?php echo $comment_id ?>" class="fdb_itm" <?php if ($cmt_depth) { ?>style="margin-left:<?php echo $cmt_depth ?>px;border-top-color:#e0e0e0"<?php } ?>>
			<span id="c_<?php echo $comment_id ?>"></span>
			<div>
				<?
					if (file_exists($photo_file)) {
							$photo_url = G5_DATA_URL.'/member/'.$mb_dir.'/'.$list[$i]['mb_id'].'_2.jpg';
							echo '<img src="'.get_view_thumbnail($photo_url, 60).'" alt="profile image" class="profile iePngFix">';
						} else {
							echo "<span class='profile no_img'>?</span>";
						} 
				?>
			</div>
			<div class="meta">
				<strong><?php echo $list[$i]['name'] ?></strong><?php if ($is_ip_view) { ?><small class="secondary"> <?php echo $list[$i]['ip']; ?></small><?php } ?>
				<span class="date"><?php echo $list[$i]['datetime'] ?></span>
			</div>
			<div style="text-align: right;">
				<?php
				include(G5_SNS_PATH.'/view_comment_list.sns.skin.php');
				?>	
			</div>
			<div class="c_<?php echo $comment_id ?> xe_content">
				<?php if (strstr($list[$i]['wr_option'], "secret")) { ?><img src="<?php echo $board_skin_url; ?>/img/icon_secret.gif" alt="비밀글"><?php } ?>
				 <?php echo $comment ?>
			</div>
			<span id="edit_<?php echo $comment_id ?>"></span><!-- 수정 -->
			<span id="reply_<?php echo $comment_id ?>"></span><!-- 답변 -->
			<input type="hidden" value="<?php echo strstr($list[$i]['wr_option'],"secret") ?>" id="secret_comment_<?php echo $comment_id ?>">
			<textarea id="save_comment_<?php echo $comment_id ?>" style="display:none"><?php echo get_text($list[$i]['content1'], 0) ?></textarea>

        <?php if($list[$i]['is_reply'] || $list[$i]['is_edit'] || $list[$i]['is_del']) {
            $query_string = str_replace("&", "&amp;", $_SERVER['QUERY_STRING']);

            if($w == 'cu') {
                $sql = " select wr_id, wr_content from $write_table where wr_id = '$c_id' and wr_is_comment = '1' ";
                $cmt = sql_fetch($sql);
                $c_wr_content = $cmt['wr_content'];
            }

            $c_reply_href = './board.php?'.$query_string.'&amp;c_id='.$comment_id.'&amp;w=c#bo_vc_w';
            $c_edit_href = './board.php?'.$query_string.'&amp;c_id='.$comment_id.'&amp;w=cu#bo_vc_w';
         ?>
			 <div class="fdb_nav">
				<?php if ($list[$i]['is_reply']) { ?><a href="<?php echo $c_reply_href;  ?>" onclick="comment_box('<?php echo $comment_id ?>', 'c'); return false;" >답변</a><?php } ?>
				<?php if ($list[$i]['is_edit']) { ?><a href="<?php echo $c_edit_href;  ?>" onclick="comment_box('<?php echo $comment_id ?>', 'cu'); return false;"  >수정</a><?php } ?>
				<?php if ($list[$i]['is_del'])  { ?><a href="<?php echo $list[$i]['del_link'];  ?>" onclick="return comment_delete();">삭제</a><?php } ?>
			</div>
        <?php } ?>
		</li>
    <?php } ?>
	<ul>
	 <?php if ($i == 0) { //댓글이 없다면 ?><p id="bo_vc_empty">등록된 댓글이 없습니다.</p><?php } ?>
</section>    
   

<!-- } 댓글 끝 -->