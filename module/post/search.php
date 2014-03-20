<?php
add_stylesheet("<link rel='stylesheet' type='text/css' href='".x::url()."/module/".$module."/search.css' />");

?>
<div class='search'>
<div class='search-form'><?include 'search_form.php';?></div>
<?php
if ( $key ) {
	$q = array();
	
	// 사이트 전제 검색 옵션이 있는 경우는 domain 조건을 제거 한다.
	if ( !meta('all_site_search') ) {
		// 사이트 검색 조건이 있는 경우
		if ( $site_list = meta('site_search') ) {
			$sl = explode( ',', $site_list );
			
			$sl_q = array();
			foreach ( $sl as $s ) {
				$sl_q[] = "domain = '".mysql_real_escape_string($s)."'";
			}
			if ( $sl_q ) $q[] = "(". implode(" OR ", $sl_q ) . ")";
		}
		else $q[] = "domain = '".etc::domain()."'";
	}
	
	// 아이디 검색 조건이 있는 경우
	if ( $search_username ) $q[] = "mb_id LIKE '%{$key}%'";
	
	
	// 코멘트 검색 조건이 있는 경우
	if ( $search_comment ) $q[] = "wr_is_comment <> 0";
	else $q[] = "wr_is_comment = 0";
	
	// 게시판 검색 조건이 있는 경우
	if ( $search_forum ) $q[] = "bo_table='{$search_forum}'";
	
	
	/* 입력된 키워드는 공백과 ,로 구분하여 키워드를 나눈다 */
	//$keyword1 = explode(' ', $key); --> 너무 관련 없는 검색이 나올 수 있으므로, ,으로만 분리 한다.
	$keyword = explode(',', $key);
	
	//$keyword = array_merge($keyword1, $keyword2);
	
	// 제목 검색 옵션이 있는 경우
	$kq = array();
	if ( $search_subject ) {
		foreach ( $keyword as $k ) {
			$kq[] = "wr_subject LIKE '%{$k}%'";
		}
	}
	
	
	// 본문 검색 옵션이 있는 경우
	if ( $search_content ) {
		foreach ( $keyword as $k ) {
			$kq[] = "wr_content LIKE '%{$k}%'";
		}
	}
	if ( $kq ) $q[] = "( ".implode ( " OR ", $kq )." )";
	
	if ( $q ) $conds  = " WHERE ".implode(' AND ', $q );
	
	
	/* 페이지 나누기 */
	if ( $in['page_no'] ) $page_no = $in['page_no'];
	else $page_no = 1;
	$no_of_pages = 10;
	
	$start = ( $page_no - 1 ) * $no_of_pages;
	
	$total_posts = db::result( "SELECT COUNT(*) FROM x_post_data $conds" );
	$posts = db::rows("SELECT bo_table, wr_id, wr_subject, wr_content, mb_id, wr_datetime FROM x_post_data $conds ORDER BY wr_datetime DESC LIMIT $start, $no_of_pages");
?>	
	<div>총 <b><?=number_format($total_posts)?></b>개의 게시물이 검색 되었습니다.</div>
	<div class='posts'>
<?php 
	foreach ( $posts as $post ) {
		$subject = cut_str(strip_tags($post['wr_subject']), 100, "...");
		$content = cut_str(strip_tags($post['wr_content']), 200, "...");
		
		if ( empty($search_username) ) {
			foreach( $keyword as $k ) {
				
				$subject = str_replace($k, "<span class='keyword'>".$k."</span>", $subject);
				$content = str_replace($k, "<span class='keyword'>".$k."</span>", $content);
			}
		}
		
		$wr_url = G5_BBS_URL.'/board.php?bo_table='.$post['bo_table'].'&wr_id='.$post['wr_id'];
		
		echo "
			<div class='row'>
				<div class='subject'><a href='$wr_url'>$subject</a></div>
				<div class='contents'><a href='$wr_url'>$content</a></div>
				<div class='post-info'>
					<span class='username'>글쓴이 $post[mb_id]</span>
					<span class='date'>작성일 $post[wr_datetime]</span>
				</div>
			</div>
		";
	}
?>
	</div>
	
	
<?php
			/* 페이징 */
			$navigator_option = array ( 
										'total_post'=> $total_posts,
										'page_no'=>$page_no,
										'no_of_post'=>$no_of_pages,
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
	<div class='search-form'><?include 'search_form.php';?></div>
</div>

