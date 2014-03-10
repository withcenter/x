
    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <div id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
			<div style="clear:both;"></div>
    </div>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->
	