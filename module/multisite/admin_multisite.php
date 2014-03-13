
<?php
	echo "
		<a class='add-new-site' style='color: #ffffff;' href='?module=multisite&action=create'>Add New Site</a>
		
		<div style='clear:right;'></div>
	";


if ( $in['page_no'] ) $page_no = $in['page_no'];
else $page_no = 1;
$no_of_post = 20;
$start = ( $page_no - 1 ) * $no_of_post;
$total_post = db::result ( "SELECT COUNT(*) FROM x_multisite_config ");

	
	//$sites = ms::gets();
	
	$sql = "SELECT * FROM x_multisite_config ORDER BY stamp_create DESC LIMIT $start, $no_of_post";
	$sites = db::rows($sql);
	
	echo "<table cellspacing=0 cellpadding=0 width='100%' class='admin-multisite-table'>";
	echo "
		<tr valign='top' class='header'>
			<td></td>
			<td>Domain</td>
			<td>Owner</td>
			<td>Site Name</td>
			<td>Theme</td>
			<td align='center'>Status</td>
			<td align='center'>No. Forum</td>
			<td align='center'>No. Post</td>
		</tr>
	";
	$i = 0;
	foreach ( $sites as $site ) {
		if ( $i % 2 == 1 ) $background="background";
		else $background = null;
		$i++;
		
		echo "<tr class='row $background'>";
			echo "<td><div class='jbutton-group'><a class='jbutton orange edit' href='?module=multisite&action=admin_update&idx=$site[idx]'>Edit</a></div></td>";
			echo "<td><a href='http://$site[domain]' target='_blank'>$site[domain]</a></td>";
			echo "<td>$site[mb_id]</td>";
			echo "<td><span class='site-title'>$site[title]</span></td>";
			
			
			$theme = x::meta_get($site['domain'],'theme');
			if ( empty($theme) ) {
				$cfg = md::config( etc::domain_name() );
				$theme = $cfg['theme'];
			}
			echo "<td>$theme</td>";
			
			
			
			
			echo "<td align='center'>".meta_get($site['domain'], 'status')."</td>";
			
			
			
			echo "<td align='center'>".x::count_forum($site['domain'])."</td>";
			
			echo "<td align='center'>".x::count_post(x::forum_ids( $site['domain'] ), null )."</td>";
			

		echo '</tr>';
	}
	echo '</table>';

/* 페이징 */

$navigator_option = array ( 
							'total_post'=> $total_post,
							'page_no'=>$page_no,
							'no_of_post'=>$no_of_post,
							'no_of_page'=>3
);



if ( $navigator_option['total_post']  % $navigator_option['no_of_post'] == 0) $pages =  intval( $navigator_option['total_post']  / $navigator_option['no_of_post'] );
else $pages =  intval( $navigator_option['total_post']  / $navigator_option['no_of_post'] )  + 1;

$pn = array();
$pn = array_chunk( range(1, $pages), $navigator_option['no_of_page'] );

if ( empty($in['nav_no'] ) ) $nav_no = 1;
else $nav_no = $in['nav_no'];

unset( $in['nav_no'] );
unset( $in['page_no'] );


$qs = http_build_query ( $in );

echo "
	<div class='admin_multisite_paging'>
		<a class='first_page_no button' href='".x::url()."/?$qs&nav_no=1&page_no=1'>&lt;&lt;</a>
	";
		
if ( $nav_no > 1 ) {
	echo "<a class='button' href='".x::url()."/?$qs&nav_no=".($nav_no - 1)."&page_no=".$pn[$nav_no - 2][0] ."'>이전</a>";
}

$start = $nav_no - 1;
for ( $i = 0; $i < $navigator_option['no_of_page'];  $i++ ) {
	if ( $no = $pn[$start][$i] ) {
		if ( $no == $page_no ) $add_class = "selected";
		else $add_class = null;
		
		echo "<a class='page_no button $add_class' href='".x::url()."/?$qs&nav_no=$nav_no&page_no=".$no."'>".$no."</a>";
	}
}
if ( $nav_no < count ( $pn ) ) {
	echo "<a class='button' href='".x::url()."/?$qs&nav_no=".($nav_no + 1). "&page_no=".$pn[$nav_no][0]."'>다음</a>";
}
echo "
		<a class='last_page_no button' href='".x::url()."/?$qs&nav_no=".count( $pn ) ."&page_no=$pages'>&gt;&gt;</a>
	</div>
";	
