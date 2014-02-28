<?php

	
	// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.n5ieikl0bsnp
	if (G5_IS_MOBILE) {	
		include x::theme('mobile/index');
		exit;
	}

?>

<div style="font-size: 2em;">

	<p>
		Welcome To Gnuboard5 Extended<br>
		GNUBoard5 Extended 입니다.
	</p>
	&nbsp;
	<p>
		This is <?=x::theme('index')?><br>
		파일 이름: <?=x::theme('index')?><br>
		
	</p>
	
</div>

