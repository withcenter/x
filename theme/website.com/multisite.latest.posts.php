<?php
$query = "SELECT domain, title FROM x_multisite_config LIMIT 0, 30";
$rows = db::rows( $query );
$image_url = x::url_theme().'/img';
$title_icon1 = "<img src='$image_url/directions-blue.png' />";
echo "<div class='latest-posts'>
		<div class='title'>$title_icon1 <a href='#'>최신 등록글</a></div>
	";
foreach ( $rows as $row ) {
	$domain_url = ms::url_site( $row['domain'] );
	$domain_title = cut_str( $row['title'], 21, "..." );
	
	echo "
		<div class='row'>
			<img class='dot' src='$dot'/>
			<a href='$domain_url' target='_blank'>$domain_title</a>
		</div>
		";
}
echo "</div>";

