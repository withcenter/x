<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
		
		</div><!--#data-->
    </div><!--.inner-->	
</div><!--#content-->




<?php
	if ($config['cf_analytics']) {
		echo $config['cf_analytics'];
	}
	include_once(G5_PATH."/tail.sub.php");
?>



<div id='footer'>
<table width='100%' cellspacing=0 cellpadding=0><tr valign='top'>
<td class='td-logo'>
	<div class='logo'>
		<img src='<?=x::url_theme()?>/img/footerlogo.png'/>
	</div>
	<div class='logo-640px'>
		<img src='<?=x::url_theme()?>/img/footer-640px.png'/>
	</div>
	<div class='logo-500px'>
		<img src='<?=x::url_theme()?>/img/footer-500px.png'/>
	</div>
</td>
<td width='80%'>
	<div class='text-info'>
		<div class='footer-text'>
		<?if ( x::meta('footer_text')) echo nl2br(x::meta('footer_text'));
		else {?>
			<div>회원님께서는 현재 필고 <b style='color:#506ab6;'>모바일 테마</b>를 선택 하셨습니다.</div>
			<div>하단 문구는 사이트 설정에서 수정하실 수 있습니다.</div>
		<?}
		?>
		</div>		
		<?/*<a href="<?=g::url()?>?device=pc">PC 버젼</a>
		<a href='<?=url_site_config()?>'>사이트 관리</a>*/?>		
	</div>	
</td>
<td>
	<div class='pc_version'>
		<a href="<?=g::url()?>?device=pc">
			<img src='<?=x::url_theme()?>/img/pc_version.png'/><br>
			<span class='label'>PC 버전</span>
		</a>		
	</div>
</td>
</tr></table>
</div>
</body>
</html>

<link rel="stylesheet" href="<?=x::theme_url()?>/css/after.css">







