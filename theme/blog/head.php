<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<script type='text/javascript' src='<?=x::url_theme()?>/js/theme.js'></script>
<div id="hd">
    <div id="hd_wrapper">
        <div id="logo">
			<a href="<?php echo G5_URL ?>">
				<?=x::meta('title')?x::meta('title') : '제목을 입력하세요';?>
			</a>
        </div>
        <ul id="tnb">
			<li class='menu-1'><a href='<?=ms::url_site(etc::domain())?>'>홈</a></li>
			<?php
				$menu_class = array( 'menu-2' , 'menu-3' , 'menu-4', 'menu-1' );
				$menus = get_site_menu();
				$i = 1;
				$color = 0; 
				foreach ( $menus as $menu ) {
				
					if ( $i % 4 == 1 ) $color = 0;
					elseif ( $i % 4 == 2 ) $color = 1;
					elseif ( $i % 4 == 3 ) $color = 2;
					elseif ( $i % 4 == 0 ) $color = 3;
					
					echo "<li class='".$menu_class[$color]."'><a href='".url_forum_list($menu['bo_table'])."'>$menu[name]</a></li>";
					
					$i++;
				}
			?>
			<li class='menu-mobile'><a href='<?=g::url()?>?device=mobile'>모바일</a></li>
        </ul>	
    </div>
</div>
<div id="wrapper">
    <div id="aside">
		<?php include('left.php');?>
		<span class='back-to-top'><img src='<?=x::url_theme()?>/img/upicon.png'>상단으로</span>
	</div>
    <div id="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

		
		<?php
			if ( write_page() ) {
				$ids = ms::forum_ids();
				$str = "<div class='forum-write-title'>글을 쓰려는 게시판을 선택해 주세요.</div>";
				foreach ( $ids as $id ) {
					
					$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '$id'");
					$str .=  " <span class='forum-select' bo_table='$id' bo_subject='$row[bo_subject]'>$row[bo_subject]</span> ";
					
				}
		?>
			<style>
				.forum-select {
					cursor: pointer;
				}
			</style>
			<script>
				$(function(){
					$('#container_title').after( "<?=$str?>" );
					$(".forum-select").click(function(){
						$(".forum-select").css("background-color", "#555555");
						$(this).css("background-color", "#5d81ae");
						var bo_table = $(this).attr('bo_table');
						var bo_subject = $(this).attr('bo_subject');
						$("form[name='fwrite'] [name='bo_table']").val( bo_table );
						$("#container_title").text( bo_subject + " 글쓰기");
					});
				});
			</script>
		<?
			}
		?>
		
		
		