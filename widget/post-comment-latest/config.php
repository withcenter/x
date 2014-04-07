<?php
	include widget_config_form('title');
	include widget_config_form('text', array(
			'name'				=> 'no',
			'caption'			=> ln('No.', '글 갯수'),
			'placeholder'	=> ln("Insert No of Posts", "출력할 글 개 수를 입력하세요.")
		)
	);
	widget_config_extra_begin();
	include widget_config_form('forum', array('no'=>5));
	include widget_config_form('css');
	widget_config_extra_end();
	