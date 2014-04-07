<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/application.form.css' />
<script src='<?=x::url_theme()?>/js/application.form.js'></script>
<div class='application-form'>
	<div class='title'>
		<img class='title-icon' src='<?=x::url_theme()?>/img/icon6.gif' />
		<div class='main-title'>상담 신청</div>
		<div class='sub-title sucess-message'>꼼꼼하게 작성해 주세요.</div>
	</div>
	<form method='post' autocomplete='off' target='hidden-frame-application' action='<?=x::url_theme()?>/application.form.submit.php'>	
		<div class='sub-title2'>상담 신청서</div>
		<div class='row'><span class='item'>이름</span> <input type='text' name='applicant' placeholder='이름' /></div>
		<div class='row'><span class='item'>유선전화</span> <input type='text' name='landline' placeholder='유선전화' /></div>
		<div class='row'><span class='item'>휴대전화</span> <input type='text' name='mobile' placeholder='휴대전화' /></div>
		<div class='row'><span class='item'>이메일</span> <input type='text' name='email' placeholder='이메일' /></div>
		
		
		<div class='extra-form'>
			<div class='row'><span class='item'>주소</span><input type='text' name='address' placeholder='주소'/></div>
			<div class='row'><span class='item'>직업</span><input type='text' name='job' placeholder='직업'/></div>
			<div class='row'><span class='item'>창업시점</span><input type='text' name='begin-date' placeholder='창업시점'/></div>
			<div class='sub-title2'>창업 배경 및 계획</div>
			<div>
				<textarea name='experience'></textarea>
			</div>
			
			<div class='captcha'>
				<img src='./x/theme/withcenter/captcha.php' /><input type='text' name='captcha' placeholder='보안문자 입력' />
			</div>
			
		</div>
		
		<div class='pannel-bottom'>	
			<img class='reset-icon' src='<?=x::url_theme()?>/img/reset.gif' title='보안문자 새로고침'/>
			<input type='image' src='<?=x::url_theme()?>/img/submit.gif' title='글쓰기'/>
			<img class='reset2-icon' src='<?=x::url_theme()?>/img/reset2.gif' title='취소'/>
			<img class='dropdown-icon' src='<?=x::url_theme()?>/img/dropdown.gif' title='더보기'/>
		</div>
	</form>
	
	<iframe src='javascript:void(0);' name='hidden-frame-application' style='display: block; width:500px; height:300px;'></iframe>
</div>
