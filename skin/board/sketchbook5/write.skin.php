<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">
<?php if($board['bo_2'] == "black") { ?><link rel="stylesheet" href="<?php echo $board_skin_url ?>/black.css"><?php } ?>
<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/ie8.css?<?php echo G5_TIME_YMD?>" /><![endif]-->
<div id="bd" class="bd   hover_effect" data-default_style="list">
	<div class="bd_hd clear">
		<div class="bd_bc fl">
			<a href="<?php echo G5_URL?>"><strong>Home</strong></a>
			<span>&rsaquo;</span><a href="<?php echo G5_BBS_URL?>/group.php?gr_id=<?php echo $group[gr_id]?>"><?php echo $group['gr_subject']?></a>
			<span>&rsaquo;</span><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=<?php echo $board[bo_table]?>"><em><?php echo $board['bo_subject'] ?></em></a>
		</div>	
	</div>


    <h2 id="container_title"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" class="bd_wrt bd_wrt_main clear">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">

    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>
	<?php if ($is_member) { // 임시 저장된 글 기능 ?>
	<div class="opt_chk clear">						
		<script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
		<button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
		<div id="autosave_pop">
			<strong>임시 저장된 글 목록</strong>
			<div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
			<ul></ul>
			<div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
		</div>
	</div>
	<?php } ?>	
    	<table class="bd_wrt_hd bd_tb">
		<tr>
		<?php if ($is_category) { ?>
			<td>
                <select name="ca_name" id="ca_name" required class="required" >
                    <option value="">선택하세요</option>
                    <?php echo $category_option ?>
                </select>			
			</td>
		<?php } ?>
			<td width="100%" style="padding-right:12px">
				<span class="itx_wrp">
					<div id="autosave_wrapper">
						<label for="wr_subject">제목을 작성해 주세요<strong class="sound_only">필수</strong></label>
						<input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="itx frm_input required" size="50" maxlength="255">
					</div>
				</span>
			</td>
		</tr>
	</table>
		<div class="get_editor">
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
			<?php } ?>
			<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			<?php if($write_min || $write_max) { ?>
			<!-- 최소/최대 글자 수 사용 시 -->
			<div id="char_count_wrap"><span id="char_count"></span>글자</div>
			<?php } ?>		
		</div>
		<div class="tag itx_wrp">
			<span class="itx_wrp">
			<label for="wr_related">태그 : 쉼표(,)를 이용하여 복수 등록 </label>
			<input name="wr_related" id="wr_related" class="itx" value="<?=$write[wr_related]?>" size="50" itemname="관련글" type="text" /> 
			</span>
		</div>	
		<div class="tag itx_wrp">
			<span class="itx_wrp">
				<label for="wr_10">동영상 링크 (* 유튜브/다음팟만 가능합니다.)</label>
				<input type="text" name="wr_10" id="wr_10" value="<?php echo $write['wr_10'] ?>" class="itx" /> <br />
				<input type="checkbox" name="wr_6" id="wr_6" value="1"<?php if($write['wr_6'] == "1") echo " checked=\"checked\""; ?> /> 리치컨텐츠사용 {이미지 :0} {이미지 :1} 형태로 원하는 곳에 이미지를 위치합니다 <br />
				<input type="checkbox" name="wr_9" id="wr_9" value="1"<?php if($write['wr_9'] == "1") echo " checked=\"checked\""; ?> /> YOUTUBE 동영상 (첫번째 이미지는 썸네일전용으로만 사용됩니다.) <br />
				<input type="checkbox" name="wr_8" id="wr_8" value="1"<?php if($write['wr_8'] == "1") echo " checked=\"checked\""; ?> /> 뷰페이지 타이틀 바꾸기 <br />
				<input type="checkbox" name="wr_7" id="wr_7" value="1"<?php if($write['wr_7'] == "1") echo " checked=\"checked\""; ?> /> MP3 플레이어 (1,2번 첨부파일은 썸네일용 이미지필수. 3~5 파일은 mp3 파일 업로드)
			</span>
		</div>	

	<div class="edit_opt">
	<?php if ($is_name) { ?>
		<span class="itx_wrp">
			<label for="wr_name">이름<strong class="sound_only">필수</strong></label>
			<input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="itx n_p frm_input required" size="10" maxlength="20">
		</span>
	<?php } ?>
	<?php if ($is_password) { ?>
		<span class="itx_wrp">
			<label for="wr_password">패스워드<strong class="sound_only">필수</strong></label>
			<input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="itx n_p frm_input <?php echo $password_required ?>" maxlength="20">
		</span>
	<?php } ?>
	<?php if ($is_email) { ?>
		<span class="itx_wrp">
			<label for="wr_email">이메일</label>
			<input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="itx m_h frm_input email" size="50" maxlength="100">
		</span>
	<?php } ?>
	<?php if ($is_homepage) { ?>
		<span class="itx_wrp">
			<label for="wr_homepage">홈페이지</label>
			<input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="itx m_h frm_input" size="50">
		</span>
	<?php } ?>
	</div>
	
	<div class="opt_chk clear">
		<div class="section"><?php echo $option ?></div>
	</div>
			
	<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
	<div class="sns_wrt">
		<label for="wr_link<?php echo $i ?>">링크<?php echo $i ?></label>
		<input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="itx m_h frm_input" size="50">
	</div>
	<?php } ?>
<?php if ($is_file == true) { ?>
	<div class="sns_wrt"><? include_once("$board_skin_path/swfupload/index.php"); ?></div>
<?php } ?>
	<?php if ($is_guest) { //자동등록방지  ?>
	<div class="sns_wrt">
		<?php echo $captcha_html ?>
	</div>
	<?php } ?>
	<div class="regist">
		
		<input type="submit" value="글쓰기" id="btn_submit" accesskey="s" class="bd_btn blue">
		<button type="button" onclick="location.href='./board.php?bo_table=<?php echo $bo_table ?>'" class="bd_btn cancle">취소</button>
	</div>
    </form>
</div>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
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

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>

<!-- } 게시물 작성/수정 끝 -->

<script src="<?php echo $board_skin_url ?>/js/jquery-ui.min.js?20131003180322"></script>
<!-- <script src="<?php echo $board_skin_url ?>/js/jquery.masonry.min.js?20131219144035"></script> -->
<script src="<?php echo $board_skin_url ?>/js/jquery.cookie.js?20131219144035"></script>
<script src="<?php echo $board_skin_url ?>/js/board.js?20131219150526"></script>
<script src="<?php echo $board_skin_url ?>/js/webfont.js?20130330204337"></script>