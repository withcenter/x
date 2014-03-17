<?php
add_stylesheet("<link rel='stylesheet' type='text/css' href='".x::url()."/module/".$module."/admin_list.css' />");
?>
<div class='admin_list'>
<?php
if ( $option == 'mb_edit' ) include_once 'admin_member_edit.php';
else {
	if ( $in['page_no'] ) $page_no = $in['page_no'];
	else $page_no = 1;
	$no_of_rows = 10;
	include 'search_form.php';

	$start = ( $page_no - 1 ) * $no_of_rows;
	$total_rows = db::result ( "SELECT COUNT(*) FROM ".$g5['member_table']." $conds");
	$rows = db::rows ( "SELECT mb_no, mb_id, mb_name, mb_nick, mb_email, mb_tel, mb_leave_date, mb_intercept_date,".REGISTERED_DOMAIN." FROM ".$g5['member_table']." $conds ORDER BY mb_no DESC LIMIT $start, $no_of_rows");
	?>
	<div class='no_of_members'>검색 회원 수 <?=number_format($total_rows)?></div>

	<table cellpadding=0 cellspacing=0 width='100%'>
		<tr class='header'>
			<td nowrap>번호</td>
			<td width=50>도메인</td>
			<td width=100>아이디</td>
			<td width=100>이름</td>
			<td width=100>닉네임</td>
			<td nowrap>이메일</td>
			<td nowrap>전화번호</td>
			<td nowrap>차단일</td>
			<td nowrap>탈퇴일</td>
			<td align='center' nowrap>관리</td>
		</tr>
	<?php
		foreach ( $rows as $row ) {
			if ( !$block_date = $row['mb_leave_date'] ) $block_date = "활동중";
			
			if ( !$leave_date = $row['mb_intercept_date'] ) $leave_date = "활동중";
			
			if ( !$site_domain = $row[REGISTERED_DOMAIN] ) $site_domain = "도메인 없음";
			
			$setting_url = x::url()."/?module={$module}&action={$action}&option=mb_edit&mb_id=$row[mb_id]";
			$image_url = x::url()."/module/{$module}/img/setting.png";
			echo "
					<tr>
						<td>$row[mb_no]</td>
						<td>$site_domain</td>
						<td>$row[mb_id]</td>
						<td>$row[mb_name]</td>
						<td>$row[mb_nick]</td>
						<td>$row[mb_email]</td>
						<td nowrap>$row[mb_tel]</td>
						<td>$leave_date</td>
						<td>$block_date</td>
						<td align='center'><a href='$setting_url'><img src='$image_url' style='border: 0;' /></a></td>
					</tr>
			";
		}
	?>	
	</table>


<?php
			/* 페이징 */
			$navigator_option = array ( 
										'total_post'=> $total_rows,
										'page_no'=>$page_no,
										'no_of_post'=>$no_of_rows,
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
					<a class='first_page_no page_no' href='".x::url()."/?$qs&nav_no=1&page_no=1'>&lt;&lt;</a>
				";
					
			if ( $nav_no > 1 ) {
				echo "<a class='button page_no' href='".x::url()."/?$qs&nav_no=".($nav_no - 1)."&page_no=".$pn[$nav_no - 2][0] ."'>이전</a>";
			}

			$start = $nav_no - 1;
			for ( $i = 0; $i < $navigator_option['no_of_page'];  $i++ ) {
				if ( $no = $pn[$start][$i] ) {
					if ( $no == $page_no ) $add_class = "selected";
					else $add_class = null;
					
					echo "<a class='page_no $add_class' href='".x::url()."/?$qs&nav_no=$nav_no&page_no=".$no."'>".$no."</a>";
				}
			}
			if ( $nav_no < count ( $pn ) ) {
				echo "<a class='button page_no' href='".x::url()."/?$qs&nav_no=".($nav_no + 1). "&page_no=".$pn[$nav_no][0]."'>다음</a>";
			}
			echo "
					<a class='last_page_no page_no' href='".x::url()."/?$qs&nav_no=".count( $pn ) ."&page_no=$pages'>&gt;&gt;</a>
				</div>
			";
}
?>
</div>