<?php
	include x::dir() . '/etc/share/head.php';
?>


<table width='100%' cellpadding='0' cellspacing='0'>
	<tr valign='top'>
		<td width='33.33%'>
			<?
				include widget(
					array(
						'code'		=> 'news_1',
						'name'		=> 'post-latest',
					)
				);
			?>
		</td>
		<td width='33.33%'>
			<?
				include widget(
					array(
						'code'		=> 'news_2',
						'name'		=> 'post-latest',
					)
				);
			?>
		</td>
		<td width='33.33%'>
			<?
				include widget(
					array(
						'code'		=> 'news_3',
						'name'		=> 'post-latest',
					)
				);
			?>
		</td>
	</tr>
	
	
</table>
