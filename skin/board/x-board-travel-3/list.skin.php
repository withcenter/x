<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once G5_LIB_PATH.'/thumbnail.lib.php'; 
?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">

<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>

<?php
 /* 사용자 평가 별 */
 $star_gold = "<img src='".$board_skin_url."/img/star_gold.gif' />";
 $star_gray = "<img src='".$board_skin_url."/img/star_gray.gif' />";
?>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <div id="bo_list_total">
            <span>Total <?php echo number_format($total_count) ?>건</span>
            <?php echo $page ?> 페이지
        </div>

        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
			<? if ( admin() ) { ?> 
				<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
		   <? }?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap">
        <?php
        foreach ($list as $li ) {
			$thumb = get_list_thumbnail($bo_table, $li['wr_id'], 93, 79);
			$content = cut_str(strip_tags($li['wr_content']), 200, "...");
			
			$product_info = null;
			if ( $li['wr_1'] ) $product_info = "<span class='product_name'>".$li['wr_1']."</span>";
			if ( $li['wr_2'] ) $product_info .= $li['wr_2'];
			
			
			/* 별의 갯구 구하기 */
			$star = null;
			if ( $li['wr_good'] > 0 && $li['wr_good'] < 3) {
				$star = $star_gold;
				for( $i=0; $i < 4; $i++ ) {
					$star .= $star_gray;
				}
				$star .= "<b>1</b>점";
			}
			else if ( $li['wr_good'] > 3 && $li['wr_good'] < 6 ) {
				for( $i=0; $i < 2; $i++ ) {
					$star .= $star_gold;
				}
				for( $i=0; $i < 3; $i++ ) {
					$star .= $star_gray;
				}
				$star .= "<b>2</b>점";
			}
			
			else if ( $li['wr_good'] > 6 && $li['wr_good'] < 9 ) {
				for( $i=0; $i < 3; $i++ ) {
					$star .= $star_gold;
				}
				for( $i=0; $i < 2; $i++ ) {
					$star .= $star_gray;
				}
				$star .= "<b>3</b>점";
			}
			else if ( $li['wr_good'] > 9 && $li['wr_good'] < 12 ) {
				for( $i=0; $i < 4; $i++ ) {
					$star .= $star_gold;
				}
				for( $i=0; $i < 1; $i++ ) {
					$star .= $star_gray;
				}
				$star .= "<b>4</b>점";
			}
			else if ( $li['wr_good'] > 12 ) {
				for( $i=0; $i < 5; $i++ ) {
					$star .= $star_gold; 
				}
				$star .= "<b>5</b>점";
			}
			else {
				for( $i=0; $i < 5; $i++ ) {
					$star .= $star_gray;
				}
				$star .= "<b>0</b>점";
			}
         ?>
        <div class="row <?php if ($li['is_notice']) echo "bo_notice"; ?>">
           
            <?php
				/*
				if ($list[$i]['is_notice']) // 공지사항
					echo '<strong>공지</strong>';
				else if ($wr_id == $list[$i]['wr_id'])
					echo "<span class=\"bo_current\">열람중</span>";
				else
					echo $list[$i]['num'];
			*/
			?>
		
			<? if ( $thumb['src'] ) {
				$add_style = null;
			?>
				<div class='photo'>
					<a href='<?=$li['href']?>'><img src='<?=$thumb['src']?>' /></a>
				</div>
			<? }
				else $add_style = "right_100";
			?>
            <div class="right <?=$add_style?>">
				<div class='subject'>
					<?php if ($is_checkbox) { ?>
						<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
					<?php } ?>
					
					<a href="<?php echo $li['href'] ?>">
						<?php echo $li['subject']; ?>
						<?php if ($li['comment_cnt']) echo "(".$li['comment_cnt'].")"; ?>
					</a>
				</div>
				<div class='content'>
					<a href='<?=$li['href']?>'><?=$content?></a>
				</div>
				<div class='product-rate-info'>
					<span class='rate'><?=$star?><? if ( $li['wr_good'] ) echo "<span class='good'>추천<b>".number_format($li['wr_good'])."</b>명</span>"?></span>
					<? if ( $product_info ) echo "<span class='product-info'>$product_info</span>";?>
					<div style='clear:right;'></div>
				</div>
            </div>
			<div style='clear:left;'></div>
        </div>
        <?php } ?>
	</div>
	
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
            <? if ( admin() ) {?>
				<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
			<? }?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

<!-- 게시판 검색 시작 { -->
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
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx"  class="frm_input required" size="15" maxlength="15">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
<!-- } 게시판 검색 끝 -->

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

    if (sw == "copy")
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
