<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<div class='extended_register_form'>
	<div class='inner'>
		<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
			<input type="hidden" name="w" value="<?php echo $w ?>">
			<input type="hidden" name="url" value="<?php echo $urlencode ?>">
			<input type="hidden" name="agree" value="<?php echo $agree ?>">
			<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
			<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
			<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
			<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
			<input type="hidden" name="mb_nick_default" value="<?php echo $member['mb_nick'] ?>">
			<input type="hidden" name="mb_nick" value="<?php echo $member['mb_nick'] ?>">
			<?php }  ?>
	<div class='title_wrapper'>
		<div class='title login'><a href='<?=G5_BBS_URL?>/login.php'>로그인</a></div>
		<div class='title register'><?php echo $g5['title'] ?></div>
		<div style='clear:both'></div>
	</div>
	
	<div class='left'>
			<div class='label'>user:</div>
			<div class='input_wrapper id'>
				<input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> class="frm_input minlength_3 <?php echo $required ?> <?php echo $readonly ?>"maxlength="20">
			</div>
			<div class='label'>pass:</div>
			<div class='input_wrapper pass'>
				<input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="frm_input minlength_3 <?php echo $required ?>" maxlength="20">
			</div>
			<div class='label'>retype:</div>
			<div class='input_wrapper retype_pass'>
				<input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="frm_input minlength_3 <?php echo $required ?>" maxlength="20">
			</div>
			<div class='label'>nickname:</div>
			<div class='input_wrapper nickname'>
				<input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick'])?$member['mb_nick']:''; ?>">
				<input type="text" name="mb_nick" value="<?php echo isset($member['mb_nick'])?$member['mb_nick']:''; ?>" id="reg_mb_nick" required class="frm_input required nospace" maxlength="20">
			</div>					
	</div>
	<div class='right'>
			<div class='label'>email:</div>
			<div class='input_wrapper email'>
				<input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
				<input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="frm_input email required" maxlength="100">	
			</div>					
			<div class='label'>phone:</div>
			<div class='input_wrapper tel_num'>
				<input type="text" name="mb_tel" value="<?php echo $member['mb_tel'] ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> class="frm_input <?php echo $config['cf_req_tel']?"required":""; ?>" maxlength="20">
			</div>
			<div class='label'>birth:</div>
			<div class='input_wrapper mb_birth'>
				<input type="text" name="mb_birth" value="<?php echo $member['mb_birth'] ?>" id="reg_mb_birth" class="frm_input" maxlength="20">
			</div>
			<div class='input_wrapper captcha'>
			<?php echo captcha_html(); ?>
			</div>
		
		<div class="btn_confirm">
				<input type="submit" value="<?php echo $w==''?'회원가입':'정보수정'; ?>" id="btn_submit" class="btn_submit" accesskey="s">
				<a href="<?php echo G5_URL ?>" class="btn_cancel">취소</a>
		</div>
	</div>
		</form>	
	<div style='clear:both'></div>
	</div>
</div>
 <script>
    $(function() {
        $("#reg_zip_find").css("display", "inline-block");
        $("#reg_mb_zip1, #reg_mb_zip2, #reg_mb_addr1").attr("readonly", true);

        <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
        // 아이핀인증
        $("#win_ipin_cert").click(function() {
            if(!cert_confirm())
                return false;

            var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
            certify_win_open('kcb-ipin', url);
            return;
        });

        <?php } ?>
        <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
        // 휴대폰인증
        $("#win_hp_cert").click(function() {
            if(!cert_confirm())
                return false;

            <?php
            switch($config['cf_cert_hp']) {
                case 'kcb':
                    $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                    $cert_type = 'kcb-hp';
                    break;
                case 'kcp':
                    $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                    $cert_type = 'kcp-hp';
                    break;
                default:
                    echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                    echo 'return false;';
                    break;
            }
            ?>

            certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
            return;
        });
        <?php } ?>
    });

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

        if (f.w.value == "") {
            if (f.mb_password.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password.focus();
                return false;
            }
        }

        /*if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }*/

        /*if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password_re.focus();
                return false;
            }
        }*/

        // 이름 검사
        if (f.w.value=="") {
            if (f.mb_name.value.length < 1) {
                alert("이름을 입력하십시오.");
                f.mb_name.focus();
                return false;
            }

            /*
            var pattern = /([^가-힣\x20])/i;
            if (pattern.test(f.mb_name.value)) {
                alert("이름은 한글로 입력하십시오.");
                f.mb_name.select();
                return false;
            }
            */
        }

        // 닉네임 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
            var msg = reg_mb_nick_check();
            if (msg) {
                alert(msg);
                f.reg_mb_nick.select();
                return false;
            }
        }

        // E-mail 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
            var msg = reg_mb_email_check();
            if (msg) {
                alert(msg);
                f.reg_mb_email.select();
                return false;
            }
        }

        if (typeof f.mb_icon != "undefined") {
            if (f.mb_icon.value) {
                if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                    alert("회원아이콘이 gif 파일이 아닙니다.");
                    f.mb_icon.focus();
                    return false;
                }
            }
        }

        if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert("본인을 추천할 수 없습니다.");
                f.mb_recommend.focus();
                return false;
            }

            var msg = reg_mb_recommend_check();
            if (msg) {
                alert(msg);
                f.mb_recommend.select();
                return false;
            }
        }

        <?php// echo chk_captcha_js();  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>