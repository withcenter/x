<?php
include x::dir().'/etc/share/head.php';
//add_stylesheet( "<link rel='stylesheet' type='text/css' href='".x::url()."/module/".$module."/site_list_for_philgo.css' />" , 0);
?>

	<table cellpadding=0 cellspacing=0 width='100%' class='site-list-table'>
		<tr valign='top' class='header'>
			<td>홈페이지 주소</td>
			<td>사이트 이름</td>
			<td align='center'>게시글 수</td>
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
			<td><a href='<?=url_site($site['domain'])?>' target='_blank'><?=x::meta_get($site['domain'], 'title')?></a></td>
			<td align='center'><?=x::count_post(x::forum_ids( $site['domain'] ) )?></td>
		</tr>
		<?
			}

		?>
	</table>
	
<style>
.site-list-table {
	margin-top: 2px;
}
.site-list-table  tr td {
	border-bottom: 1px solid #d5d5d5;
	height: 33px;
	line-height: 33px;
	padding: 0 10px;
}

.site-list-table .header td {
	font-family: '맑은 고딕', AppleGothic;
	font-size: 10pt;
	color: #737373;
	font-weight: bold;
	height: 30px;
	line-height: 30px;
}

.site-list-table .background {
	background-color: #f5f5f5;
}

.site-list-table a {
	color: #313131;
}
</style>