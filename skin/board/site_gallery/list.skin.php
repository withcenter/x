<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<!-- 게시판 목록 시작 { -->
<div class='list_site_gallery'>

<? if ( super_admin() ) {?>

        <?php if ($rss_href || $write_href) { ?>
        <div class="admin-menu">
            <?php if ($rss_href) { ?><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a><?php } ?>
            <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a><?php } ?>
        </div>
        <?php } ?>
<? }?>

	<form name="fboardlist"  id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
		<input type="hidden" name="stx" value="<?php echo $stx ?>">
		<input type="hidden" name="spt" value="<?php echo $spt ?>">
		<input type="hidden" name="page" value="<?php echo $page ?>">
		<input type="hidden" name="sw" value="">
		
		<div class='title'>사이트 갤러리</div>	
		<table cellpadding=0 cellspacing=0 width='100%'>
			<tr>
		<?php
			$i = 0;
			foreach ( $list as $li ) {
				if ( $i != 0 && $i % 3 == 0 ) echo "</tr><tr>";
				if ( $i % 3 == 0 || $i % 3 == 1) $add_margin = "<td width=10></td>"; 
				$i++;
				$thumb = get_list_thumbnail($bo_table, $li['wr_id'], 320, 320);
				
				if ( $thumb['src'] ) {
					if ( super_admin() ) {
						$url = $li['href'];
						$target = null;
					}
					else {
						$url = $li['wr_link1'];
						$target = "target='_blank'";
					}
					
					// 제목
					$subject = conv_subject($li['wr_subject'], 15, '...');
					echo "
						<td>
							<div class='photo'>
								<a href='$url' $target><img src='".$thumb['src']."' /></a>
								<div class='pannel'>
									$subject   <a href='$url' target='_blank'>사이트로 이동</a>
								</div>
							</div>
						</td>".$add_margin;
				}
			}
				if ( $i % 3 == 1  )  echo "<td></td><td width=10></td><td></td>";
				else if ( $i % 3 == 2 ) echo "<td></td>";
			?>
				</tr>
			</table>
			
		<? if ( super_admin() ) {?>
			<?php if ($list_href || $is_checkbox || $write_href) { ?>
			<div class="bo_fx">
				<?php if ($is_checkbox) { ?>
				<ul class="btn_bo_adm">
					<li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
					<li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
					<li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
				</ul>
				<?php } ?>

				<?php if ($list_href || $write_href) { ?>
				<ul class="btn_bo_user">
					<?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
					<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
				</ul>
				<?php } ?>
			</div>
			<?php } ?>
		<? }?>

    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

<!-- 게시물 검색 시작 { -->
<? /*
<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
        <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
        <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
        <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
        <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required" size="15" maxlength="15">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
*/?>
<!-- } 게시물 검색 끝 -->

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
