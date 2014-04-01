<?php
$query = "SELECT domain, title FROM x_multisite_config WHERE title <> '' LIMIT 0, 11";
$rows = db::rows( $query );
$image_url = x::url_theme().'/img';
$title_icon1 = "<img src='$image_url/directions-blue.png' />";
echo "<div class='newest-site-list'>
		<div class='title'>$title_icon1 <a href='#'>질문과답변</a></div>
	";
foreach ( $rows as $row ) {
	$domain_url = site_url( $row['domain'] );
	$domain_title = cut_str( $row['title'], 21, "..." );
	$dot = $image_url.'/dot.gif';
	
	echo "
		<div class='row'>
			<img class='dot' src='$dot'/>
			<a href='$domain_url' target='_blank'>$domain_title</a>
		</div>
		";
}
echo "</div>";
