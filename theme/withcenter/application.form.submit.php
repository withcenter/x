<?php
	include '../../../common.php';
	include_once '../../etc/class.php';
?>
<!DOCTYPE html>
<html>
<head>
<!--[if lt IE 9]>
		<script type='text/javascript' src='<?php echo G5_URL ?>/x/js/jquery-1.11.0-rc1.js'></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type='text/javascript' src='<?php echo G5_URL ?>/x/js/jquery-2.1.0-rc1.js'></script>
<!--<![endif]-->
</head>
<body>
<?php
	if ( md5( $in['captcha'] ) != $_COOKIE['captcha'] ) {
		jsAlert("보안문자를 정확하게 입력해 주세요");
		exit;
	}

	$applicant = db::addquotes($in['applicant']);
	$landline = db::addquotes($in['landline']);
	$mobile = db::addquotes($in['mobile']);
	$email = db::addquotes($in['email']);
	$job = db::addquotes($in['job']);
	$experience = db::addquotes(strip_tags($in['experience']));

	$address = db::addquotes($in['address']);
	$begin_date = db::addquotes($in['begin-date']);
	
	if ( empty($applicant ) ) {
		jsAlert("이름을 입력해 주세요");
		exit;
	}
	
	if ( empty($landline ) && empty($mobile) ) {
		jsAlert("최소 1개 이상의 전화번호를 입력해 주세요.");
		exit;
	}
	
	
	if ( empty($email ) ) {
		jsAlert("이메일을 입력해 주세요");
		exit;
	}
	
	if ( empty($job ) ) {
		jsAlert("직업을 입력해 주세요");
		exit;
	}
	
	if ( empty($experience ) ) {
		jsAlert("창업 배경 및 계획을 입력해 주세요");
		exit;
	}
	
	if ( empty($address ) ) {
		jsAlert("주소를 입력해 주세요");
		exit;
	}
	
	if ( empty($begin_date ) ) {
		jsAlert("창업시점을 입력해 주세요");
		exit;
	}
	
	if ( (strlen($applicant) > 100) || (strlen($landline) > 100) || (strlen($mobile) > 100) || (strlen($email) > 100) || (strlen($job) > 100) || (strlen($address) > 100) || (strlen($begin_date) > 100) ) {
		jsAlert("입력하신 문자의 갯수가 너무 많습니다.");
		exit;
	}
	
	
	$subject = $applicant."님께서 ".date('Y-m-d H:i', time())."에 상담 신청을 하였습니다.";

	$option = array(
					'bo_table'=>'application',
					'mb_name'=>$application,
					'mb_email'=>$email,
					'wr_1'=>$landline,
					'wr_2'=>$email,
					'wr_3'=>$address,
					'wr_4'=>$job,
					'wr_5'=>$begin_date,
					'wr_subject'=>$subject,
					'wr_content'=>$experience
					
	);


	$wr_id = g::write($option);


	$message = "<b>".$applicant."</b>님의 상담이 접수되었습니다. - 신청시간 (".date('Y-m-d H:i', time()).")";

	if ( $wr_id ) {
				echo "
						<script>
							$(function() {
								parent.callback_application_submit( '$message' );
							});
						</script>
					";
	} else jsAlert("상담 접수에 실패 하였습니다.");
	?>
</body>
</html>