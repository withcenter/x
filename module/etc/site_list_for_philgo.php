<?php
include x::dir().'/etc/share/head.php';
?>
<style>
table tr td {
	padding: 1em;
}
</style>
	<table cellpadding=0 cellspacing=0 width='100%' class='admin-list-table'>
		<tr valign='top' class='header'>
			<td><b>홈페이지 주소</b></td>
			<td><b>사이트 이름</b></td>
			<td align='center'><b>게시글 수</b></td>
		</tr>
		<?php
			$sites = db::rows("SELECT * FROM x_site_config WHERE good > 0 ORDER BY good DESC, domain ASC LIMIT 20");
			
			$hosts = array();
			foreach ( $sites as $site ) { 
				$hosts[] = $site['domain'];
				if ( $i % 2 == 1 ) $background='background';
				else $background = null;
				$i++;
			?>
		<tr valign='top' class='row <?=$background?>'>
			<td><a href='<?=url_site($site['domain'])?>' target='_blank'><?=$site['domain']?></a></td>
			<td><?=x::meta_get($site['domain'], 'title')?></td>
			<td align='center'><?=x::count_post(x::forum_ids( $site['domain'] ) )?></td>
		</tr>
		<?
			}

		?>
	</table>
	
