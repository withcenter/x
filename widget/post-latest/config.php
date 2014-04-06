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
	include widget_config_form('css');
	widget_config_extra_end();
?>
<style>
	input[type='text'] {
		width: 33%;
	}
</style>
