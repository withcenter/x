<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$application_status = "님께서 ".date('Y.m.d H:i')."에 작업 의뢰를 하였습니다.";
?>
<div id="application-form">
    <!-- 게시물 작성/수정 시작 { -->

    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
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
	<input type="hidden" name="wr_subject" value='<?=$application_status?>' />
	<? if ($is_secret) {?> 
		<input type="hidden" name="secret" value="secret">
	<? }?>
	
	<script>
		var application_status = "<?=$application_status?>";
	</script>
    <?php
	
	// 웹사이트 분류 선택 박스 
	ob_start();
	$c = array(
				'company' => '회사/업체/상품소개',
				'community' => '커뮤니티(카페)',
				'shopping' => '쇼핑몰'		
	);
	echo "<select name='wr_6'>
			<option value=''>분류를 선택 하세요</option>
			<option value=''></option>
	";
	foreach ( $c as $key => $value ) {
		if ( $wr_6 == $key ) $selected = "selected";
		else $selected = null;
		
		echo "<option value='$key' $selected>$value</option>";
	}
	
	echo "</select>";
	
	$sel_category = ob_get_clean();
	
    ?>
	<div class='application-title'><div class='inner'>제작의뢰 신청서</div></div>
	<table cellpadding=0 cellspacing=0 width='100%' class='application-table'>
		<tr>
			<td class='name-title'>
			<span class='item-title'>회사/단체/신청자</span></td>
			<td><input type='text' name='wr_1' value='<?=$wr_1?>' /></td>
		</tr>
		<tr>
			<td><span class='item-title'>주소</span></td>
			<td><input type='text' name='wr_2' value='<?=$wr_2?>' /></td>
		</tr>
		<tr>
			<td><span class='item-title'>작성자 이름</span></td>
			<td>
				<? if ( login() ) {?>
					<?=$member['mb_id']." (".$member['mb_nick'].")"?>
					<input type='hidden' name='wr_name' value='<?=$member['mb_id']."(".$member['mb_nick'].")"?>' />
				<? }
					else {?>
				<input type='text' name='wr_name' value='<?=$name?>' />
				<? }?>
			</td>
		</tr>
		<tr>
			<td><span class='item-title'>전화</span></td>
			<td>
				<input type='text' name='wr_4' value='<?=$wr_4?>' placeholder='유선 전화'/>
				<input type='text' name='wr_5' value='<?=$wr_5?>' placeholder='휴대 전화' />
			</td>
		</tr>
		<tr>
			<td><span class='item-title'>이메일</span></td>
			<td><input type='text' name='wr_link1' value='<?=$write['wr_link1']?>' /></td>
		</tr>
		<tr>
			<td><span class='item-title'>현재 웹사이트 주소</span></td>
			<td><input type='text' name='wr_link2' value='<?=$write['wr_link2']?>' /></td>
		</tr>
		<tr>
			<td class='item-underline'><span class='item-title'>웹사이트 분류</span></td>
			<td class='item-underline'><?=$sel_category?></td>
		</tr>
		<tr>
			<td><span class='item-title'>템플릿 선택</span></td>
			<td><div class='sel-template-msg'></div></td>
		<tr>
		</table>
		
		<div class='select_themes'>
			<input type='hidden' name='wr_7' value='<?=$wr_7?>' />
			<? if ( $wr_7 ) $active_theme = $wr_7; ?>
			<iframe class='show-template-frame' frameborder=0 border=0 width='100%' src='<?=x::url()?>/?module=site&action=template&theme=n&active_theme=<?=$wr_7?>'></iframe>
		</div>
		
		<table cellpadding=0 cellspacing=0 width='100%' class='application-table'> 	
		<tr>
			<td><span class='item-title'>예상 제작 기간</span></td>
			<td><input type='text' name='wr_8' value='<?=$wr_8?>' /></td>
		</tr>
		<tr>
			<td><span class='item-title'>신청 도메인</span></td>
			<td>
				<input type='text' name='wr_9' value='<?=$wr_9?>' />
				<div class='item-message'>원하시는 도메인이 사용 중인 경우 다른 도메인을 선택 하셔야 합니다.</div>
			</td>
		</tr>
		<tr>
			<td class='item-underline' valign='top'><span class='item-title'>기타 요청사항</span></td>
			<td><?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			</td>
		</tr>
	</table>
	<div class='terms-conditions'>
		<div class='title'>계약 확인 및 동의</div>
			<ul>
				<li>홈페이지 개설 비용은 5만원 ( 1년 도메인, 웹호스팅 포함 ) 이며, 추가 기능, 디자인 요청시 비용이 증가 할 수 있습니다.</li>

				<li>처음 사이트 개설 1년 후 매 년 5만원 의 유지 비용을 지불해야합니다.</li>

				<li>모든 비용은 선불입니다.</li>

				<li>웹호스팅은 기본 사양(HDD 400M, 트래픽 1.4G)이며 방문자가 늘어날 수록 웹 트래픽 량을 증설 해야 할 수 있습니다. 이 경우 비용이 증가 될 수 있습니다.</li>
			</ul>
			<div class='terms-agree'><input type='checkbox' name='wr_10' value=1 id='agreement' <?=$wr_10?"checked=1":""?>/> 동의 합니다. </div>
	</div>
	<?php/** if ($is_guest) { //자동등록방지  ?>
        <div class='margin'><span class='item-title item-extra captcha-title'>보안문자 입력</span><?php echo $captcha_html ?></div>
    <?php } */?>
	
	<?php if ($is_secret) {?>
		<div class='margin-bottom'><span class='item-title item-extra'>비밀번호</span> <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"/></div>
	<? }?>
	<div class='captcha_submit'>
		<div class='input_wrapper captcha'>
			<div class='inner_wrapper'>
				<?php echo captcha_html(); ?>
			</div>
		</div>
		<div class="btn_confirm">
			<input type="image" value="신청하기" id="btn_submit" accesskey="s" src="<?=$board_skin_url?>/img/template_submit.png">
			<a href="./board.php?bo_table=<?php echo $bo_table ?>"><img src="<?=$board_skin_url?>/img/template_cancel.png"</a>
		</div>
		<div style="clear: both"></div>
	</div>
    </form>
	<style>

		#captcha #captcha_mp3 span {
			background: url("<?=$board_skin_url?>/img/sound_icon.png");
			width: 106px;
			height: 38px;
		}
		
		#captcha #captcha_reload span {
			background: url("<?=$board_skin_url?>/img/reload_icon.png");
			width: 106px;
			height: 38px;
		}
	</style> 
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
		f.wr_subject.value = f.wr_name.value + application_status;
			
		var content = f.wr_content.value;
		if ( f.wr_content.value == '' ) f.wr_content.value = '기타 요청 사항 없음';
		
		// 폼 유효성 검사
		if ( f.wr_1.value == '' ) {
			alert ( "회사/단체/신청자를 입력 하세요");
			return false;
		}
		
		if ( f.wr_2.value == '' ) {
			alert ( "주소를 입력 하세요");
			return false;
		}
		
		if ( f.wr_name.value == '' ) {
			alert ( "담당자 성함을 입력 하세요");
			return false;
		}
		
		if ( f.wr_4.value == '' && f.wr_5.value == '') {
			alert ( "최소 1개 이상의 전화 번호를 입력하세요.");
			return false;
		}
		
		if ( f.wr_6.value == '' ) {
			alert ( "웹사이트 분류를 선택 하세요.");
			return false;
		}
		
		if ( f.wr_7.value == '' ) {
			alert ( "템플릿을 선택 하세요.");
			return false;
		}
		
		if ( f.wr_8.value == '' ) {
			alert ( "예상 제작기간을 입력하세요.");
			return false;
		}
		
		if ( f.wr_email.value == '' ) {
			alert ( "이메일을 입력하세요.");
			return false;
		}
		
		if ( !document.getElementById("agreement").checked ) {
			alert ("계약 확인을 읽어 보신 후 계약을 원하실 경우 동의합니다에 체크해 주세요.");
			return false;
		}
	
		
        <?php  echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함   ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
	
	var iframe_height;
	function callback_preview( src, theme, theme_name ) {
		$(".popup").remove();
		$(".dark-bg").remove();
		
		var user_scroll = $(window).scrollTop()-130;
		var popup_style = " style='position:absolute;top:" + user_scroll + "px;left:0;'"
		$("#application-form").prepend("<div class='dark-bg'></div><div class='popup'><div class='popup-preview' " + popup_style + "><div class='inner'><img src='" + src + "' />" + 
		"<div><span class='select-theme'>선택하기</span><span class='close-select-theme'>창 닫기</span></div></div>" +
		"</div></div>" );
				
		var popup_margin_left = ( ( $('#application-form').width() - $(".popup-preview").width() ) / 2 );
		$(".popup-preview").css('margin-left', popup_margin_left + 'px');		
		//$("html, body").animate({ scrollTop: 150 }, 600);
		
		$(".dark-bg").click(function(){
			$(".popup").remove();
			$(".dark-bg").remove();
		});
		
		$(".close-select-theme").click(function() {
			$(".popup").remove();
			$(".dark-bg").remove();
		});
		
		$(".select-theme").click(function() {
			$("input[name='wr_7']").val ( theme );
			$(".sel-template-msg").html("<b>" + theme_name + "</b> 이 선택 됨");
			var old_src = $(".show-template-frame").prop("src", '<?=x::url()?>/?module=site&action=template&theme=n&active_theme=' + theme);
			
			callback_iframe_resize ( iframe_height + 350 );
						
			$(".popup").remove();
			$(".dark-bg").remove();
		});
	}
	
	function callback_iframe_resize( height ) {
		iframe_height = height;
		$(".show-template-frame").height( height + 50 );
	}
    </script>
</div>
<!-- } 게시물 작성/수정 끝 -->