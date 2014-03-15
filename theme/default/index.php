<?php

?>


	<div class='page-header'>
		익스텐디드에 오신 것을 환영합니다.
	</div>
	
	<p>
			홈페이지 관리자 이십니까? 그렇다면,
			<ul>
				<li> <a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank">사용 설명서를 먼저 읽어 보세요.</a></li>
				<li> <a href='<?=url_site_admin('', 'multi', 'config_theme')?>'>테마를 변경해 보세요.</a></li>
			</ul>
	</p>
	
	
	<p>
			개발자 이십니까? 그렇다면,
			<ul>
				<li> <a href='https://docs.google.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/pub' target='_blank'>개발자 문서를 읽어 보세요.</a></li>
				<li> <a href='http://extended.kr' target='_blank'>X 홈페이지에서 정보를 얻으세요.</a></li>
			</ul>
	</p>
	
	<?include 'site-create-form.php';?>
	
	<table>
		<tr valign=top>
			<td><?include 'site-list.php';?></td>
			<td><?include 'post-list.php';?></td>
		</tr>
	</table>
