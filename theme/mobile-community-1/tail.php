<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    </div><!--#container-->
</div><!--#wrapper-->




<?php
	if ($config['cf_analytics']) {
		echo $config['cf_analytics'];
	}
	include_once(G5_PATH."/tail.sub.php");
?>



<div id='footer'>
	
	Copyright(C) 2004 All Rights Reserved.
	<a href="?device=pc">PC 버젼</a>

</div>
</body>
</html>








