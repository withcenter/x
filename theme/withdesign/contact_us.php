<div class='contact-us'>
	<span class='main-title'>Contact Us</span>
	<span class='main-description'>Request a free quote or say hi! We will get back to you within 24 hours.</span>

<? 

	$action_url = g::url().'/bbs/write_update.php';
	$application_status = "님께서 ".date('Y.m.d H:i')."에 작업 의뢰를 하였습니다.";
	$bo_table = bo_table(1);
	
?>
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>"  method="post" enctype="multipart/form-data" autocomplete="off" target='submit_contact_form'>
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
	<script>
		var application_status = "<?=$application_status?>";
	</script>
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
			<? include x::theme('template_contactus') ?>
		</div>
		
		<table cellpadding=0 cellspacing=0 width='100%' class='application-table'> 	
		<tr>
			<td><span class='item-title'>예상 제작 기간</span></td>
			<td><input type='text' name='wr_8' value='<?=$wr_8?>' class='template_name_field'/></td>
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
			<td>
				<textarea name='wr_content' style='width: 94%; height: 150px;'><?=$wr_10?></textarea>
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

	<div class='captcha_submit'>
		<div class='input_wrapper captcha'>
			<div class='inner_wrapper'>
				<?php echo captcha_html(); ?>
			</div>
		</div>
		<div class="btn_confirm">
			<input type="image" value="신청하기" id="btn_submit" accesskey="s" src="<?=x::theme_url('img/submit_template.png')?>">
			<a href="javascript: void(0)" class='cancel_template'><img src="<?=x::theme_url('img/cancel_template.png')?>"/></a>
		</div>
		<div style="clear: both"></div>
	</div>
    </form>
	
	<script>
		function check_submit() {
			var iframe_element = $("#submit_contact_form").contents().find("div.title");
			var write_subject = $(iframe_element).find("span").text();
			if ( write_subject != '' ) { 
				alert('Thank you for contacting us. Please expect a response from us within 24-48 hours.');
				$("#fwrite")[0].reset()
			}
		};
	</script>

	<iframe name='submit_contact_form' onload="check_submit()" id="submit_contact_form"></iframe>

</div>
