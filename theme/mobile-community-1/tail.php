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
		<div style='margin-bottom:5px;'>어드민 페이지에서 하단 이미지를 입력해 주세요. 어드민 페이지에서 하단 이미지를 입력해 주세요.</div>
		<div>Copyright(C) 2004 All Rights Reserved.</div>
		<a href="<?=g::url()?>?device=pc">PC 버젼</a>
	</div>
	<div style='clear:both;'></div>
</div>
</body>
</html>








