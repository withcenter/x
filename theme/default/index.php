<?php

?>


	<div class='page-header'>
		익스텐디드에 오신 것을 환영합니다.
	</div>
	
	<p>
			홈페이지 관리자 이십니까? 그렇다면,
			<ul>
				<li> <a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank">사용 설명서를 먼저 읽어 보세요.</a></li>
				<li> <a href='<?=url_site_admin('', 'multi', 'config_theme')?>'>테마를 선택해 보세요.</a></li>
				<li> 위젯을 변경해 보세요.</li>
			</ul>
	</p>
	
	
	<p>
			개발자 이십니까? 그렇다면,
			<ul>
				<li> 홈페이지 관리자를 위한 문서들을 먼저 읽어 보세요.</li>
				<li> 그 다음, 개발자를 위한 코딩 가이드를 먼저 읽어 보세요.</li>
				<li> 위젯(스킨)을 개발해 보세요.</li>
				<li> 테마를 개발해 보세요.</li>
			</ul>
	</p>
	
	<?include 'site-create-form.php';?>
	
	<table>
		<tr valign=top>
			<td><?include 'site-list.php';?></td>
			<td><?include 'post-list.php';?></td>
		</tr>
	</table>
