<?php
	include widget_config_form('title');
	include widget_config_form('forum');
	include widget_config_form('text', array(
			'name'				=> 'no',
			'caption'			=> ln('No.', '글 갯수'),
			'placeholder'	=> ln("Insert No of Posts", "출력할 글 개 수를 입력하세요.")
		)
	);
	widget_config_extra_begin();
	
	include widget_config_form('forum', array( 'from' => 2, 'to'=>5) );
	$text = ln("URL on click", "클릭 URL");
	echo "<div><span class='caption'>$text</span> : <input type='text' name='url' value='$widget_config[url]'></div>";
	
	include widget_config_form( 'file', array(
		'name'				=> 'icon',
		'caption'			=> ln('Icon', '아이콘'),
	) );



	include widget_config_form('target');
	echo "<div>클릭시 새창으로 해당 게시글을 엽니다.</div>";
	
	
	
	include widget_config_form('textarea', array(
		'name'				=> 'css',
		'caption'			=> ln('STYLE', '스타일') . " ( CSS )",
	));
	widget_config_extra_end();
?>
<style>
	input[type='text'] {
		width: 33%;
	}
</style>
