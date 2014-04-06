<?php

	include widget_config_form( 'file', array(
		'name'				=> 'banner',
		'caption'			=> ln('Banner', '배너'),
	) );
	
	include widget_config_form('text', array(
			'name'				=> 'url',
			'caption'			=> ln('Click URL', '클릭 URL'),
			'placeholder'	=> ln("Input URL", "이동할 URL 을 입력하십시오.")
		)
	);
	include widget_config_form('checkbox', array(
			'name'				=> 'target',
			'caption'			=> ln('New Window', '새 창'),
			'comment'		=> ln('Open in New Tab', '새 창으로 열기'),
		)
	);
	include widget_config_form('textarea', array(
		'name'				=> 'html',
		'caption'			=> 'HTML',
	));
	echo ln("Use &lt;style&gt; tag to input style (css)", "&lt;style&gt; 태그를 사용해서 CSS 를 입력 할 수 있습니다.") . '<br>';
	
	 
