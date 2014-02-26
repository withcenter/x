<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(x::dir().'/class/temp_image_resizer.php');
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<?

if ( $list ) {
	foreach ( $list as $li ) {
		$thumb = get_list_thumbnail($bo_table, $li['wr_id'], 300, 300);
		if ( empty($thumb['src']) ) {  // 만약 로컬 데이터 저장소에 이미지가 없다면 본문의 img 태그에서 이미지를 가져온다.
			//$content = get_view_thumbnail ( $li['wr_content'], 50 );  /* 사이즈 조절이 안된다. */
			
			$image = get_editor_image( $li['wr_content'] );
		}
		
?>
		<div class='post-container'>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'>
			<table width='100%'>
				<tr>
					<td><div  class='subject-container' ><span class='subject'><?=$li['wr_subject']?></span></div></td>
					<td align='right'>
						<div  class='date-author-container'>
							<span class='date-author'>
								<? /* <b>글쓴이</b> <span><?=$li['wr_name']?></span>  */?>
								<b>작성일</b><?=$newDate = date("Y-m-d", strtotime($li['wr_datetime']))?>
							</span>
						</div>
					</td>
				</tr>
				<tr><td colspan=2><span class='post-content'>
				<?php  if ( $thumb['src'] ) $image_url = $image_content = "<img src='".$thumb['src']."' />";
						else if ( empty($thumb['src']) && $image[0][0] ) $image_content = $image[0][0];
				?>
				
				<span class='post-images'>
					<?=$image_content?>
				</span>
				<?=cut_str(strip_tags($li['wr_content']),1000,'...')?></span></td></tr>
			</table>
			</a>
		</div>
<? }
}
else {?>
			<div class='post-container'>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'>
			<table width='100%'>
				<tr>
					<td><div  class='subject-container' ><span class='subject'>필고 블로그 테마를 이용중 입니다.</span></div></td>
					<td align='right'>
						<div  class='date-author-container'>
							<span class='date-author'>
								<b>작성일</b><?=$newDate = date("Y-m-d", time())?>
							</span>
						</div>
					</td>
				</tr>
				<tr><td colspan=2><span class='post-content'>
				
				<span class='post-images'>
					<img src='http://philgo.com/theme/philgo/img/logo.png' />
				</span>
				필고 블로그 테마를 선택 해 주셔서 감사합니다. 
				
			</table>
			</a>
		</div>
<?}?>

