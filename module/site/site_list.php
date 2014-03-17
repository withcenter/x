<?php
	// 페이징
	if ( $in['page_no'] ) $page_no = $in['page_no'];	
	else $page_no = 1;
	$no_of_post = 30;
	$start = ( $page_no - 1 ) * $no_of_post;

	$q = array();
	$conds = null;
	if ( $domain_name || $title ) {
		/* 우선 사이트 이름이 들어 왔을 때는 x_config의 code가 title인 것에서 검색 조건을 확인 하고, 해당 하는 도메인(key)를 가져온다 
		 * 그런 후 그 도메인을 가지고 검색 조건을 만든다.
		*/
		
		if ( $title ) {
			$title = mysql_real_escape_string ( $title );
			
			$domain_lists_tmp = db::rows("SELECT `key` FROM x_config WHERE `code` = 'title' AND `value` LIKE '%".$title."%' ");
			$domain_lists = array();
			foreach ( $domain_lists_tmp as $dls ) {
				$domain_lists[] = "domain = '".$dls['key']."'";
			}
			
			if ( $domain_lists ) $q[] = "(".implode( " OR ", $domain_lists ).")";
		}
		
		if ( $domain_name ) {
			$domain_name = mysql_real_escape_string( $domain_name );
			
			$q[] = "domain LIKE '%".$domain_name."%'";
		}
		
		if ( $q ) $conds = " AND ".implode( " AND ", $q );
	}

$total_post = db::result (  "SELECT COUNT(*) FROM x_site_config WHERE domain <> '.com' AND domain <> '.org' AND domain <> '.net' AND domain <> '.kr' $conds" );

 $sites = db::rows ( "SELECT * FROM x_site_config WHERE domain <> '.com' AND domain <> '.org' AND domain <> '.net' AND domain <> '.kr' $conds ORDER BY idx DESC LIMIT $start, $no_of_post");
?>	
<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/<?=$module?>/site_list.css' />

<div class='site-list'>
<form method='get'>
	<input type='hidden' name='module' value='<?=$module?>' />
	<input type='hidden' name='action' value='<?=$action?>' />

	<div class='search-form'>
		<div class='title'>사이트 검색</div>
		<span class='item'>사이트 이름</span><input type='text' name='title' value='<?=$title?>' />
		<span class='item'>사이트 주소</span><input type='text' name='domain_name' value='<?=$domain?>' />
		<input type='submit' value='검색' />
	</div>
</form>

	<div class='title'>검색된 사이트 <b><?=number_format($total_post)?></b>개</div>
	<table cellpadding=0 cellspacing=0 width='100%'>
		<tr class='table-header'>
			<td nowrap>번호</td>
			<td nowrap>사이트 이름</td>
			<td nowrap>사이트 주소</td>
			<td nowrap>테마</td>
			<td nowrap>등록일</td>
			<td colspan=2 nowrap>상태</td>
		</tr>
<?php
 foreach ( $sites as $site ) {
	$title = cut_str(x::meta_get ( $site['domain'], 'title' ), 10, '...');
	$theme = x::meta_get ( $site['domain'], 'theme' );
	$status = x::meta_get ( $site['domain'], 'status' );
	
	$move_to_site = null;
	if ( $status == 'close' ) {
		$status = '<b>폐쇠됨</b>';
		$move_to_site = "<b>차단된 사이트</b>";
	}
	else {
		$url_site = site_url( $site['domain']);
		$status = '운영중';
		$move_to_site = "<a href='$url_site' target='_blank'>사이트로 이동</a>";
	}
	
	$date = date('Y.m.d', $site['stamp_created'] );
	
		echo "
			<tr>
				<td nowrap>$site[idx]</td>
				<td>$title</td>
				<td>$site[domain]</td>
				<td nowrap>$theme</td>
				<td nowrap>$date</td>
				<td nowrap>$status</td>
				<td nowrap>$move_to_site</td>
			</tr>
		";
 }
?>
	</table>
<?php
			/* 페이징 */
			$navigator_option = array ( 
										'total_post'=> $total_post,
										'page_no'=>$page_no,
										'no_of_post'=>$no_of_post,
										'no_of_page'=>5
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
				<div class='paging'>";
				
			if ( $page_no != 1 ) echo "<a class='first_page_no page_no' href='".x::url()."/?$qs&nav_no=1&page_no=1'>&lt;&lt;</a>";
					
			if ( $nav_no > 1 ) {
				echo "<a class='page_no' href='".x::url()."/?$qs&nav_no=".($nav_no - 1)."&page_no=".$pn[$nav_no - 2][0] ."'>이전</a>";
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
				echo "<a class='page_no' href='".x::url()."/?$qs&nav_no=".($nav_no + 1). "&page_no=".$pn[$nav_no][0]."'>다음</a>";
			}
			
			if ( $page_no < count ( $pn ) ) {
				echo "
						<a class='last_page_no page_no' href='".x::url()."/?$qs&nav_no=".count( $pn ) ."&page_no=$pages'>&gt;&gt;</a>
						</div>
					";
			}
		?>
</div>