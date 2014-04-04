<?php
	include widget_config_form('subject');
	include widget_config_form('forum', 3);
	include widget_config_form('text', 'no', ln('No.', '글 갯수'), ln("Insert No of Posts", "출력할 글 개 수를 입력하세요."));
	widget_config_extra_begin();
	echo "<div><span class='caption'>My Name</span> : <input type='text' name='my_name' value='$widget_config[my_name]'></div>";
	include widget_config_form('css');
	widget_config_extra_end();
?>
<style>
	input[type='text'] {
		width: 60%;
	}
</style>
