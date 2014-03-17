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
<td>
	<div class='text-info'>
		<div class='footer-text'><?=nl2br(x::meta('footer_text'))?></div>		
		<?/*<a href="<?=g::url()?>?device=pc">PC 버젼</a>
		<a href='<?=url_site_config()?>'>사이트 관리</a>*/?>
	</div>	
</td>
<td>
	<div class='pc_version'>
		<a href="<?=g::url()?>?device=pc">
			<img src='<?=x::url_theme()?>/img/pc_version.png'/>
			<span class='label'>PC Version</span>
		</a>		
	</div>
</td>
</tr></table>
</div>
</body>
</html>

<link rel="stylesheet" href="<?=x::theme_url()?>/css/after.css">







