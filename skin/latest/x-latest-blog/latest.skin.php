<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(x::dir().'/class/temp_image_resizer.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php'); 
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<?

if ( $list ) {
	$w = 200;
	$h = 100;
	foreach ( $list as $li ) {
		$thumb = get_list_thumbnail($bo_table, $li['wr_id'], $w, $h);
		if ( empty($thumb['src']) ) {  // 만약 로컬 데이터 저장소에 이미지가 없다면 본문의 img 태그에서 이미지를 가져온다.
			//get_view_image_url([string with img src content],[width],[height],[quality(1-100?)]);
			// $thumb['src'] = get_image_thumbnail_url($li['wr_content'],200,160,100);

			$thumb['src'] = g::thumbnail_from_image_tag( $li['wr_content'], $bo_table, $w, $h );

		}
?>
		<div class='post-container'>
			<table width='100%'>
				<tr>
					<td><div  class='subject-container' >	<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'><span class='subject'><?=$li['wr_subject']?></span></a></div></td>
					<td align='right'>
						<div  class='date-author-container'>
							<span class='date-author'>
								<? /* <b>글쓴이</b> <span><?=$li['wr_name']?></span>  */?>
								<b>작성일</b><?=$newDate = date("Y-m-d", strtotime($li['wr_datetime']))?>
							</span>
						</div>
					</td>
				</tr>
				<tr><td colspan=2>
					<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'>
					<span class='post-content'>
						<?php  if ( $thumb['src'] ) $image_content = "<img src='".$thumb['src']."' />";
							   else $image_content = null;
						?>
						<?if( $image_content ){?>
							<span class='post-images'>
								<?=$image_content?>
							</span>
						<?}?>
							<?=cut_str(strip_tags($li['wr_content']),1000,'...')?></span>
					</a>
				</td></tr>
			</table>

		</div>
<? 	
	}
}
else {?>
			<div class='post-container'>

			<table width='100%'>
				<tr>
					<td><div  class='subject-container' ><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'><span class='subject'>필고 블로그 테마를 이용중 입니다.</span></a></div></td>
					<td align='right'>
						<div  class='date-author-container'>
							<span class='date-author'>
								<b>작성일</b><?=$newDate = date("Y-m-d", time())?>
							</span>
						</div>
					</td>
				</tr>
				<tr><td colspan=2><span class='post-content'>
				<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$bo_table?>&wr_id=<?=$li['wr_id']?>'>
					<span class='post-images'>
						<img src='http://philgo.com/theme/philgo/img/logo.png' />
					</span>
					필고 블로그 테마를 선택 해 주셔서 감사합니다. <br>
					현재에는 등록된 글이 없으며, 사이트는 <b>기본 설정</b>으로 되어 있습니다
				</a>
				<div>
					<a style='color: #ffffff;' class='button' href='<?=ms::url_config()?>'>사이트 설정 바로 가기</a>
				</div>
			</table>
		</div>
<?}?>

