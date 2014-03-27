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
 
	<div class='application-title'><div class='inner'>REQUEST REVIEW</div></div>
	<table cellpadding=0 cellspacing=0 width='100%' class='application-table'>
		<tr valign='top'>
			<td class='name-title'>
			<span class='item-title'>회사 / 단체 / 신청자</span></td>
			<td><input type='text' name='wr_1' value='<?=$wr_1?>' /></td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>주소</span></td>
			<td><input type='text' name='wr_2' value='<?=$wr_2?>' /></td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>작성자 이름</span></td>
			<td>
				<? if ( login() ) {?>
					<div class='member_name'><?=$member['mb_id']." (".$member['mb_nick'].")"?></div>
					<input type='hidden' name='wr_name' value='<?=$member['mb_id']."(".$member['mb_nick'].")"?>' />
				<? }
					else {?>
				<input type='text' name='wr_name' value='<?=$name?>'/>
				<? }?>
			</td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>전화</span></td>
			<td>
				<input type='text' name='wr_3' value='<?=$wr_3?>' placeholder='000 00 00'/>
				<input type='text' name='wr_4' value='<?=$wr_4?>' placeholder='000 00 00' />
			</td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>이메일</span></td>
			<td><input type='text' name='wr_link1' value='<?=$write['wr_link1']?>'/></td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>현재 웹사이트 주소</span></td>
			<td><input type='text' name='wr_link2' value='<?=$write['wr_link2']?>'/></td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>웹사이트 분류</span></td>
			<td><input type='text' name='wr_5' value='<?=$wr_5?>'/></td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>예상 제작 기간</span></td>
			<td><input type='text' name='wr_6' value='<?=$wr_6?>' /></td>
		</tr>
		<tr valign='top'>
			<td><span class='item-title'>신청 도메인</span></td>
			<td>
				<input type='text' name='wr_7' value='<?=$wr_7?>' />
				<div class='item-message'>원하시는 도메인이 사용 중인 경우 다른 도메인을 선택 하셔야 합니다.</div>
			</td>
		</tr>
		<tr valign='top'>
			<td class='item-underline' valign='top'><span class='item-title'>기타 요청사항</span></td>
			<td><?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			</td>
		</tr>
	</table>
	<div class='terms-conditions'>
		<div class='title'>계약 확인 및 동의</div>
		<div class='inner'>
			<ul>
				<li>홈페이지 개설 비용은 5만원 ( 1년 도메인, 웹호스팅 포함 ) 이며, 추가 기능, 디자인 요청시 비용이 증가 할 수 있습니다.</li>

				<li>처음 사이트 개설 1년 후 매 년 5만원 의 유지 비용을 지불해야합니다.</li>

				<li>모든 비용은 선불입니다.</li>

				<li>웹호스팅은 기본 사양(HDD 400M, 트래픽 1.4G)이며 방문자가 늘어날 수록 웹 트래픽 량을 증설 해야 할 수 있습니다. 이 경우 비용이 증가 될 수 있습니다.</li>
			</ul>
			<!--<div class='terms-agree'><input type='checkbox' name='wr_10' value=1 id='agreement' <?=$wr_10?"checked=1":""?>/> 동의 합니다. </div>-->
		</div>
	</div>
	<table cellpadding=0 cellspacing=0 width='100%' class='application-table'>
			<tr valign='top'>
				<td class='name-title'>
				<span>NAME</span></td>
				<td><input type='text' name='wr_8' value='<?=$wr_8?>' /></td>
			</tr>
			<tr valign='top'>
				<td><span>ADDRESS</span></td>
				<td><input type='text' name='wr_9' value='<?=$wr_9?>' /></td>
			</tr>
			<tr valign='top'>
				<td><span>EMAIL</span></td>
				<td><input type='text' name='wr_email' value='<?=$wr_email?>' /></td>
			</tr>
			<tr>
				<td><span>ARE YOU HUMAN?</span></td>
				<td>		
					<div class='input_wrapper captcha'>
						<div class='inner_wrapper'>
							<?php echo captcha_html(); ?>
						</div>
					</div>
				</td>
			</tr>
			<tr>
			<td colspan='2' align='right'>
				<div>
					<input type="image" value="신청하기" id="btn_submit" accesskey="s" src="<?=$board_skin_url?>/img/template_submit.png">
					<a href="./board.php?bo_table=<?php echo $bo_table ?>"><img src="<?=$board_skin_url?>/img/template_cancel.png"></a>
				</div>
			</td>
			</tr>
	</table>
	
	<?php if ($is_secret) {?>
		<div class='margin-bottom'><span class='item-title item-extra'>비밀번호</span> <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"/></div>
	<? }?>

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

</div>
<!-- } 게시물 작성/수정 끝 -->