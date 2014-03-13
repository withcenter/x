<?php
	$forum = meta('forum_no_1');
	$forum_id = $g5['write_prefix'].$forum;
	
	if ( $in['page_no'] ) $page_no = $in['page_no'];
	else $page_no = 1;
	$no_of_post = 1;
	$start = ( $page_no - 1 ) * $no_of_post;
	$total_post = db::result ( "SELECT COUNT(*) FROM $forum_id" );


	
	$row = db::row("SELECT wr_id, wr_subject, wr_content, wr_datetime FROM $forum_id WHERE wr_id = wr_parent ORDER BY wr_num LIMIT $start, $no_of_post");

	$thumb = get_list_thumbnail($forum, $row['wr_id'], 450, 350);
	
	if ( empty($thumb['src']) )  $thumb['src'] = g::thumbnail_from_image_tag( $row['wr_content'], $forum, 450, 350 );
	$content = cut_str(strip_tags($row['wr_content']), 280, '...');
	$subject_tmp = cut_str(get_text($row['wr_subject']), 10, '...');
	$subject_array = explode(' ', $subject_tmp);
	$subject_first = "<span class='first-word'>".$subject_array[0]." </span>";
	unset($subject_array[0]);
	$subject = $subject_first.implode(' ', $subject_array );
	
	$url = G5_BBS_URL.'/board.php?bo_table='.$forum.'&wr_id='.$row['wr_id'];
	
	$image = "<img src='".$thumb['src']."' />";
	
?>
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/blog_main.css' />
<div class='blog_main'>
	<table cellpadding=0 cellspacing=0 width='100%'>
		<? if ( $row ) {?>
			<tr valign='top'>
				<? if ( $thumb['src'] ) {?>
					<td width=450><div class='main-photo'><a href='<?=$url?>'><?=$image?></a></div></td>
					<td width=10></td>
				<? }?>
				<td>
					<div class='main-content'>
						<div class='title'><a href='<?=$url?>'><?=$subject?></a></div>
						<div class='content'><a href='<?=$url?>'><?=$content?></a></div>
						<div class='more-button'>
							<a href='<?=$url?>'>상세보기</a>
						</div>
					</div>
				</td>
			</tr>
		<? }
			else {?>
			<tr valign='top'>
				<td width=450>
					<div class='main-photo'>
						<a href='<?=url_site_config()?>'>
							<img src='<?=x::url_theme()?>/img/default_main_image.png' />
						</a>
					</div>
				</td>
				<td width=10></td>
				<td>
					<div class='main-content'>
						<div class='title'><a href='<?=$url?>'><span class='first-word'>필고</span> 블로그 테마를 이용중 입니다.</a></div>
						<div class='content'>
							<a href='<?=url_site_config()?>'>
								필고 <b>블로그 테마</b>를 선택 해 주셔서 감사합니다.<br /><br />
								현재는 등록된 글이 없으며, 사이트는 <b>기본 설정</b>으로 되어 있습니다.
							</a>
						</div>
						<div class='more-button'>
							<a href='<?=url_site_config()?>'>사이트 설정</a>
						</div>
					</div>
				</td>
			</tr>
		<?}?>
	</table>
	<div class='date'><b>작성일</b> <?=date('Y-m-d H:i:s')?></div>
	<div class='pagination'>
	<?php
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

		echo "
			<div class='paging'>
				<a class='first_page_no page_no' href='".g::url()."/?nav_no=1&page_no=1'>&lt;&lt;</a>
			";
				
		if ( $nav_no > 1 ) {
			echo "<a class='page_no' href='".g::url()."/?nav_no=".($nav_no - 1)."&page_no=".$pn[$nav_no - 2][0] ."'>이전</a>";
		}

		$start = $nav_no - 1;
		for ( $i = 0; $i < $navigator_option['no_of_page'];  $i++ ) {
			if ( $no = $pn[$start][$i] ) {
				if ( $no == $page_no ) $add_class = "selected";
				else $add_class = null;
				
				echo "<a class='page_no $add_class' href='".g::url()."/?nav_no=$nav_no&page_no=".$no."'>".$no."</a>";
			}
		}
		if ( $nav_no < count ( $pn ) ) {
			echo "<a class='page_no' href='".g::url()."/?nav_no=".($nav_no + 1). "&page_no=".$pn[$nav_no][0]."'>다음</a>";
		}
		echo "
				<a class='last_page_no page_no' href='".g::url()."/?nav_no=".count( $pn ) ."&page_no=$pages'>&gt;&gt;</a>
			</div>
		";
	?>
	</div>
</div>

