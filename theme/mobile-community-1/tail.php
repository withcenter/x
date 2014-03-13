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
	<div class='logo'>
		<img src='<?=x::url_theme()?>/img/footerlogo.png'/>
	</div>
	<div class='text-info'>
		<div class='footer-text'><?=nl2br(x::meta('footer_text'))?></div>		
		<a href="<?=g::url()?>?device=pc">PC 버젼</a>
		<a href='<?=url_site_config()?>'>사이트 관리</a>
	</div>
	<div style='clear:both;'></div>
</div>
</body>
</html>

<link rel="stylesheet" href="<?=x::theme_url()?>/css/after.css">







