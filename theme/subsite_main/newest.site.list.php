<?php
$query = "SELECT domain FROM x_site_config ORDER BY idx DESC LIMIT 0, 30";

$rows = db::rows( $query );
$image_url = x::url_theme().'/img';
$title_icon1 = "<img src='$image_url/directions-blue.png' />";
echo "<div class='newest-site-list'>
		<div class='title'>$title_icon1 <a href='".x::url()."/?module=multi&action=site_list'>최근 생성사이트</a></div>
	";
foreach ( $rows as $row ) {
	$domain_url = ms::url_site( $row['domain'] );
	$domain_url = str_replace("\\", '', $domain_url);
	$domain_title = cut_str( x::meta_get($row['domain'], 'title'), 21, "..." );
	$dot = $image_url.'/dot.gif';
	
	echo "
		<div class='row'>
			<img class='dot' src='$dot'/>
			<a href='$domain_url' target='_blank'>$domain_title</a>
		</div>
		";
}
echo "</div>";

