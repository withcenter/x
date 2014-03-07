<link rel='stylesheet' type="text/css" href="<?=x::url_theme()?>/css/application_management.css" />
<script src='<?=x::url_theme()?>/js/application_management.js'></script>
<?php
if ( $in['page_no'] ) $page_no = $in['page_no'];
else $page_no = 1;
$no_of_post = 20;
$start = ( $page_no - 1 ) * $no_of_post;
$total_post = db::result ( "SELECT COUNT(*) FROM ".$g5['write_prefix']."application");

$posts = db::rows("SELECT * FROM ".$g5['write_prefix']."application ORDER BY wr_num LIMIT $start, $no_of_post");

echo "<div class='application-management'>
		<div class='no_of_post'><b>$total_post</b> 개의 상담이 접수 되었습니다.</div>";

foreach ( $posts as $p ) { 
	$description = nl2br($p['wr_content']);
	echo "
		<div class='row'>
			<div class='application'>
				<span class='subject'>$p[wr_subject]</span>
				<span class='date'>$p[wr_datetime]</span>
				<span class='username'>$p[wr_6]</span>
				<div syle='clear:right;'></div>
			</div>
			<div class='description'>
				<table cellpadding=0 cellspacing=0 width='100%'>
					<tr>
						<td width=90><span class='item'>신청자</span></td>
						<td>$p[wr_6]</td>
						<td width=80><span class='item'>이메일</span></td>
						<td>$p[wr_2]</td>
					</tr>
					<tr>
						<td width=90><span class='item'>유선전화</span></td>
						<td>$p[wr_1]</td>
						<td width=90><span class='item'>휴대전화</span></td>
						<td>$p[wr_7]</td>
					</tr>
					<tr>
						<td width=90><span class='item'>주소</span></td>
						<td colspan=3>$p[wr_3]</td>
					</tr>
					<tr>
						<td colspan=4>
							<div class='sub-title'><div class='inner'>창업 배경 및 계획</div></div>
							<div class='content'>$description</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	";
}
echo "</div>";


/* 페이징 */
$navigator_option = array ( 
							'total_post'=> $total_post,
							'page_no'=>$page_no,
							'no_of_post'=>$no_of_post,
							'no_of_page'=>10
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
	<div class='paging'>
		<a class='first_page_no' href='?$qs&nav_no=1&page_no=1'>&lt;&lt;</a>
	";
		
if ( $nav_no > 1 ) {
	echo "<a class='button' href='".g::url()."/?$qs&nav_no=".($nav_no - 1)."&page_no=".$pn[$nav_no - 2][0] ."'>이전</a>";
}

$start = $nav_no - 1;
for ( $i = 0; $i < $navigator_option['no_of_page'];  $i++ ) {
	if ( $no = $pn[$start][$i] ) {
		if ( $no == $page_no ) $add_class = "selected";
		else $add_class = null;
		
		echo "<a class='page_no $add_class' href='?$qs&nav_no=$nav_no&page_no=".$no."'>".$no."</a>";
	}
}
if ( $nav_no < count ( $pn ) ) {
	echo "<a class='button' href='?$qs&nav_no=".($nav_no + 1). "&page_no=".$pn[$nav_no][0]."'>다음</a>";
}
echo "
		<a class='last_page_no' href='?$qs&nav_no=".count( $pn ) ."&page_no=$pages'>&gt;&gt;</a>
	</div>
";
?>

