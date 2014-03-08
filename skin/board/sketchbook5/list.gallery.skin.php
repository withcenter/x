<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$type = "gallery";

$category_option = '';
if ($board['bo_use_category']) {
    $is_category = true;
    $category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table;

    $category_option .= '<li class="cnbMore"><a href="'.$category_href.'"';
    if ($sca=='')
        $category_option .= ' class="bubble"' ;
    $category_option .= '>전체</a></li>';

    $categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
    for ($i=0; $i<count($categories); $i++) {
        $category = trim($categories[$i]);
        if ($category=='') continue;
        if ($category==$sca) { // 현재 선택된 카테고리라면
			$category_option .= '<li class="on"><a class="a1 on" href="'.($category_href."&amp;sca=".urlencode($category)).'"';
            $category_msg = '<span class="sound_only">열린 분류 </span>';
        } else {
			$category_option .= '<li><a class="a1" href="'.($category_href."&amp;sca=".urlencode($category)).'"';
			$category_msg = '';
		}
        $category_option .= '>'.$category_msg.$category.'</a></li>';
    }
}
?>
<style type="text/css">
.bd .bolder{color:#ff7f50;text-shadow:2px 2px 4px #d2691e;}
.bd .bg_color{background-color:#ff7f50;}
.bd .bg_f_color{background-color:#ff7f50;background:-moz-linear-gradient(#FFF -50%,#ff7f50 50%);background:-webkit-linear-gradient(#FFF -50%,#ff7f50 50%);background:linear-gradient(to bottom,#FFF -50%,#ff7f50 50%);}
.bd .border_color{border-color:#ff7f50;}
.bd .bx_shadow{ -webkit-box-shadow:0 0 2px #d2691e;box-shadow:0 0 2px #d2691e;}
.viewer_with.on:before{background-color:#ff7f50;box-shadow:0 0 2px #ff7f50;}
.bd_zine.zine li:first-child,.bd_tb_lst.common_notice tr:first-child td{margin-top:2px;border-top:1px solid #DDD}
.bd_zine.zine li:hover .tmb_wrp{ -ms-transform:rotate(5deg);-moz-transform:rotate(5deg);-webkit-transform:rotate(5deg);transform:rotate(5deg)}
.bd_zine.card li:hover{z-index:10;-ms-transform:scale(1.05);-moz-transform:scale(1.05);-webkit-transform:scale(1.05);transform:scale(1.05)}

.bd_zine .tmb_wrp .no_img{width:<?php echo $board['bo_gallery_width']?>px;height:240px;line-height:240px}
.bd_zine a:hover,.bd_zine a:focus,.bd_zine .select a,.bd_zine li.on{z-index:20;border-color:#d96611;} /* 마우스오버시 색상 */
.bd_zine.zine .tmb_wrp img,.bd_zine.card li{  }
.bd_zine .info b,.bd_zine .info a{color:#d2691e;}
.bd_zine.card h3{color:#ff7f50;}
.bd_zine.zine .rt_area{margin-left:<?php echo $board['bo_gallery_width']?>px}
.bd_zine.zine .tmb_wrp{margin-left:-<?php echo $board['bo_gallery_width']?>px}
.bd_zine{margin:0 auto;padding:5px 0}
.bd_zine li{width:<?php echo $board['bo_gallery_width']?>px;margin:5px}
.bd_zine .tmb_wrp .no_img{width:<?php echo $board['bo_gallery_width']?>px;height:158px;line-height:158px;border:1px solid #DDD}
@media screen and (max-width:640px){
.bd_zine.card li{width:140px}
}
@media screen and (max-width:480px){
.bd_zine.card li{width:200px}
}
@media screen and (max-width:360px){
.bd_zine.card li{width:128px}
}
</style>
<div id="bd" class="bd  hover_effect" data-default_style="gallery">
	<div class="bd_hd clear">
		<div class="bd_bc fl">
			<a href="<?php echo G5_URL?>"><strong>Home</strong></a>
			<span>&rsaquo;</span><a href="<?php echo G5_BBS_URL?>/group.php?gr_id=<?php echo $group[gr_id]?>"><?php echo $group['gr_subject']?></a>
			<span>&rsaquo;</span><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=<?php echo $board[bo_table]?>"><em><?php echo $board['bo_subject'] ?></em></a>
		</div>
		<div class="bd_font fr" style="display:none">
			<a class="select tg_btn2" href="#" data-href=".bd_font_select"><b>T</b><strong>추천글꼴</strong><span class="arrow down"></span></a>
			<div class="bd_font_select tg_cnt2"><button type="button" class="tg_blur2"></button>
				<ul>
					<li class="ui_font on"><a href="#" title="나눔고딕 등의 여러글꼴을 섞어서 사용합니다">추천글꼴</a><em>✔</em></li>
					<li class="ng"><a href="#popup_menu_area">나눔고딕</a><em>✔</em></li>
					<li class="window_font"><a href="#">맑은고딕</a><em>✔</em></li>
					<li class="tahoma"><a href="#">돋움</a><em>✔</em></li>
				</ul><button type="button" class="tg_blur2"></button>
			</div>
		</div>
		<div class="bd_set fr m_btn_wrp">
			<?php if ($admin_href) { ?><a class="bubble" href="<?php echo $admin_href ?>" title="관리자."><em>✔</em> <strong>관리자</strong></a><?php } ?>
			<a class="show_srch bubble" href="#" title="검색창을 열고 닫습니다"><b class="ico_16px search"></b>검색</a>
			<?php if ($write_href) { ?><a href="<?php echo $write_href ?>"><b class="ico_16px write"></b>쓰기</a><?php } ?>
			<span class="font_select"><a class="select tg_btn2" href="#" data-href=".bd_font_select"><b class="tx_ico_chk">T</b>글꼴<i class="arrow down"></i></a></span>
		</div>
	</div>



	<div class="bd_lst_wrp">
		<div class="tl_srch clear">
			<div class="bd_tl">
				<h1 class="ngeb clear"><i class="bg_color"></i><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=<?php echo $board[bo_table]?>"><?php echo $board['bo_subject'] ?></a></h1>
				<h2 class="clear"><i class="bg_color"></i><?php echo $board['bo_3']?></h2>
			</div>
			<div class="bd_faq_srch">
				<form name="fsearch" method="get">
				<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
				<input type="hidden" name="sca" value="<?php echo $sca ?>">
				<input type="hidden" name="sop" value="and">
					<table class="bd_tb">
						<tr>
							<td><span class="select itx">
								<select name="sfl" id="sfl">
									<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
									<option value="wr_related"<?php echo get_selected($sfl, 'wr_related'); ?>>태그</option>
									<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
									<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
									<option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
									<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
									<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
									<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
								</select>
								</span>
							</td>
							<td class="itx_wrp"><input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx"  class="itx srch_itx frm_input required" size="15" maxlength="15"></td>
							<td><input type="submit" value="검색" class="bd_btn"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="cnb_n_list">
			<div>
				<div class="bd_cnb clear css3pie">
					<a class="home" href="<?php echo G5_BBS_URL?>/board.php?bo_table=<?php echo $board[bo_table]?>" title="글 수 '<?php echo number_format($total_count) ?>'"><i class="home ico_16px">Category</i></a>
					<div class="dummy_ie fr"></div>
						<ul class="bubble bg_f_f9 css3pie">
						<?php echo $category_option ?>
					</ul>
				</div>
			</div>

			<div class="lst_btn fr">
			<ul>
				<li class="classic<?php if($type == "list") echo " on";?>"><a class="bubble" href="<?=$board_skin_url?>/command.php?bo_table=<?=$board['bo_table']?>&type=list" title="Text Style"><b>List</b></a></li>
				<li class="zine<?php if($type == "webzin") echo " on";?>"><a class="bubble" href="<?=$board_skin_url?>/command.php?bo_table=<?=$board['bo_table']?>&type=webzin" title="Text + Image Style"><b>Webzine</b></a></li>
				<li class="gall<?php if($type == "gallery") echo " on";?>"><a class="bubble" href="<?=$board_skin_url?>/command.php?bo_table=<?=$board['bo_table']?>&type=gallery" title="Gallery Style"><b>Gallery</b></a></li>
				<li class="cloud<?php if($type == "picture") echo " on";?>"><a class="bubble" href="<?=$board_skin_url?>/command.php?bo_table=<?=$board['bo_table']?>&type=picture" title="Picture Style"><b>Picture</b></a></li>
			</ul>
		</div>
	</div>

<div class="cnb_n_list">
<?php if ($is_checkbox) { ?>
	<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
	<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
<?php } ?>
</div>
		<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
		<input type="hidden" name="stx" value="<?php echo $stx ?>">
		<input type="hidden" name="spt" value="<?php echo $spt ?>">
		<input type="hidden" name="sca" value="<?php echo $sca ?>">
		<input type="hidden" name="page" value="<?php echo $page ?>">
<ol id="mansonry" class="bd_lst bd_zine card img_load" data-masonry="_">
<?php for ($i=0; $i<count($list); $i++) {
		$list[$i][preview] = strip_tags($list[$i][wr_content]);
		$list[$i][preview] = nl2br($list[$i][preview]);
		$list[$i][preview] = preg_replace("/\s*<br\s?\/?>\s*/i", " ", $list[$i][preview]);
		$list[$i][preview] = str_replace("\"", "\\\"", $list[$i][preview]);
		$list[$i][preview] = str_replace("&nbsp;", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("{이미지:0}", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("{이미지:1}", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("{이미지:2}", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("{이미지:3}", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("{이미지:4}", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("{이미지:5}", "", $list[$i][preview]);
		$list[$i][preview] = str_replace("&gt;", "", $list[$i][preview]);
		$list[$i][preview] = conv_subject($list[$i][preview], 100, "...");

		if(!$list[$i][preview]) $list[$i][preview] = "내용없음";
 ?>
	<li class="clear<?php if ($wr_id == $list[$i]['wr_id']) { ?> on<?php } ?>">
		<div class="rt_area">
			<div class="tmb_wrp ribbon_v">
			<?php
				$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], "");

				if($thumb['src']) {
					$img_content = '<img class="tmb" src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" />';
				} else {
					$img_content = '<span class="no_img tmb">no image</span>';
				}
					echo $img_content;
				?>
			    <?php
					if ($list[$i]['is_notice']) // 공지사항
						echo '<span class="ribbon nnu notice"><i>notice</i></span>';
					else if ($wr_id == $list[$i]['wr_id'])
						echo "<span class='ribbon nnu update'><i>ING</i></span>";
					else  if ($list[$i]['icon_new'])
						echo "<span class='ribbon nnu new'><i>NEW</i></span>";
					else  if ($list[$i]['icon_hot'])
						echo "<span class='ribbon nnu hot'><i>HOT</i></span>";
					else
						echo "";
             ?>
			</div>
		<?php if ($is_checkbox) { ?>
			<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
			<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
		<?php } ?>
			<h3 class="ngeb"><?php echo $list[$i]['subject'] ?><?php if ($list[$i]['comment_cnt']) { ?><span class="replyNum" title="댓글"> + <?php echo $list[$i]['comment_cnt']; ?></span><?php } ?>
</h3>
			<div class="cnt"><?php echo$list[$i][preview] ?></div>
			<div class="info">
				<span class="itm">Date<b><?php echo $list[$i]['datetime2'] ?></b></span>
				<span class="itm">By<b><?php echo $list[$i]['name'] ?></b></span>
				<span class="itm">Views<b><?php echo $list[$i]['wr_hit'] ?></b></span>
			</div>
		</div>
		<a class="hx" href="<?php echo $list[$i]['href'] ?>" data-viewer="<?php echo $list[$i]['href'] ?>"><span class="blind">Read More</span></a>
	</li>
<?php } ?>
</ol>
<script type="text/javascript">
//<![CDATA[
jQuery(function($){
	$('#mansonry').imagesLoaded(function(){
		$('#mansonry').masonry({
			itemSelector:'li',
			columnWidth:<?php echo $picture_width + 20?>,
			isFitWidth:true,
			isAnimated:true,
			animationOptions:{duration:500,easing:'easeInOutExpo',queue:true}
		});
	});
});
//]]>
</script>
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>
</form>
