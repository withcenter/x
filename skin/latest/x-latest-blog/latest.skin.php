<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<table class='blog-latest' cellpadding=0 cellspacing=0 width='100%'>
<?php
if ( $list ) {
	$w = 150;
	$h = 100;

	foreach ( $list as $li ) {
		$thumb = get_list_thumbnail($bo_table, $li['wr_id'], $w, $h);
		if ( empty($thumb['src']) ) {  // 만약 로컬 데이터 저장소에 이미지가 없다면 본문의 img 태그에서 이미지를 가져온다.
			//get_view_image_url([string with img src content],[width],[height],[quality(1-100?)]);
			// $thumb['src'] = get_image_thumbnail_url($li['wr_content'],200,160,100);

			$thumb['src'] = g::thumbnail_from_image_tag( $li['wr_content'], $bo_table, $w, $h );

		}
		if ( $thumb['src'] ) {
			$image = "<td class='photo' width=150><img src='".$thumb['src']."' /></td><td width=10></td>";
			$colspan = null;
		}
		else {
			$image = null;
			$colspan = 'colspan=3';
		}
?>
		<tr class='blog-post-container' valign='top'>
			<?=$image?>
			<td class='right' <?=$colspan?>>
				<div class='date'><b>작성일</b><?=$newDate = date("Y-m-d", strtotime($li['wr_datetime']))?></div>
				<div class='subject'>
					<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'><?=cut_str(get_text($li['wr_subject']), 25, "...");?></a>
				</div>
				<div class='content'>
					<a href='<?=G5_BBS_URL?>/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'><?=cut_str(strip_tags($li['wr_content']), 200,'...')?></a>
				</div>
			</td>
		</tr>	
<? 	
	}
}
else {?>
		<tr class='blog-post-container' valign='top'>
			<td class='photo' width=150><img src='http://philgo.com/theme/philgo/img/logo.png' /></td><td width=10></td>
			<td class='right' <?=$colspan?>>
				<div class='date'><b>작성일</b><?=$newDate = date("Y-m-d", time())?></div>
				<div class='subject'>
					<a href='javascript:void(0)'>필고 블로그 테마를 이용중 입니다.</a>
				</div>
				<div class='content'>
					<a href='javascript:void(0)'>필고 블로그 테마를 선택 해 주셔서 감사합니다. <br>
					현재에는 등록된 글이 없으며, 사이트는 <b>기본 설정</b>으로 되어 있습니다</a>
				</div>
			</td>
		</tr>	
<?}?>
</table>
